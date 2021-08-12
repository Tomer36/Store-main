<!DOCTYPE html>
<html>

<head>
    <title>L&T | Market</title>
    <meta name="description" content="This is the description">
    <link rel="stylesheet" href="styles.css" />
    <script src="store.js" async></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
    <header class="main-header">
        <nav class="main-nav nav">
            <ul>
                <li><a href="index.php">STORE</a></li>
                <li><a href="Sign_up.php">SIGN UP</a></li>
                <li><a href="Sign_in.php">SIGN IN</a></li>
            </ul>
        </nav>
        <h1 class="band-name band-name-large">Shopping List</h1>
        <?php
        session_start();
        if (!isset($_SESSION['Email'])) {
            echo "<script>alert('You Must Login First!!');window.location.href='Sign_in.php';</script>";
        }
        ?>
        <div id="login">
            <?php
            if (isset($_SESSION['Email'])) { //test if we have a login username
                print "Hello, " . $_SESSION["Email"];

            ?>
                <a href="logout.php"><br>Logout</a>
                <?php
                if (isset($_SESSION["Admin"])) //if the client is admin
                    if ($_SESSION["Admin"] == 1) {
                ?>
                    <a href="family-members-control.php">Admin Privileges</a>
                <?php
                    } else {
                ?>
                    <a href="family_request_forum.php">Family Member Request</a>
                <?php
                    }
                ?>

            <?php
            }
            ?>

        </div>
    </header>
    <nav class="secondary-nav nav">
        <ul>
            <li><button id="ShowBtn" onclick="show()" value="Show Recommended Items">Show Recommended Items</button></li>
            <?php
            if (isset($_SESSION["family_list"]))
                if ($_SESSION["family_list"] == '33') {
            ?>
                <button class="btn btn-secondary show-prev" onclick="location.href='family_items_list.php';" value="item1">Edit All Purchased Items</button>
            <?php

                } else { ?>
                <button class="btn btn-secondary show-prev" onclick="location.href='non_family_items_list.php';" value="item1">Edit All Purchased Items</button>
            <?php
                }
            ?>
        </ul>
    </nav>
    <hr class="solid">
    <div class="float-container">
        <div class="float-child">
            <div class="list">
                <h3>Type Items To Add:</h3>
                <input type="text" class="addItemInput" id="search" placeholder="Typing.."> &nbsp
                <button class="btn btn-primary list-item-button"> Add Item </button> &nbsp&nbsp
                <ul>
                </ul>
            </div>
        </div>
        <div class="float-child">
            <div id="prevtitle">
                <h3>Make New List</h3>
                <button class="btn-new-list" onclick="newList()">Make Empty List</button>
                <br><br>
                <form>
                    <label for="dates">Choose Previous List</label>
                    <select name="date" id="dates">
                        <option value="date1">1/8/2021</option>
                        <option value="date2">9/8/2021</option>
                    </select>
                    <br><br>
                </form>
                <button class="btn btn-primary" onclick="checkANDview()">Load</button>
            </div>
        </div>
    </div>
    <div class=spacer></div>
    <section class="container content-section">
        <div id="RecommendedItems">
            <h2 class="section-header">Recommended Items</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">Nescafi</span>
                    <img class="shop-item-image" src="Images/nes.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Milk</span>
                    <img class="shop-item-image" src="Images/milk.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
            </div>
            </h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">chocolate</span>
                    <img class="shop-item-image" src="Images/chock3.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">HotDogs</span>
                    <img class="shop-item-image" src="Images/hotdog.jpg">
                    <div class="shop-item-details">
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO LIST</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="container content-section">
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <div id='NEW' class="cart-items">
        </div>
    </section>
    <br><br><br>

    <footer class="main-footer">
        <div class="container main-footer-container">
            <h4 class="band-name">L&T © 2021 All Rights Reserved</h4>

        </div>
    </footer>
</body>
<script>
    document.getElementById("RecommendedItems").style.display = "none";

    function show() {
        var x = document.getElementById("RecommendedItems");
        var btn = document.getElementById("ShowBtn");
        if (x.style.display == "none" && btn.value == "Show Recommended Items") {
            x.style.display = "block";
            btn.innerHTML = "Hide Recommended Items";
        } else {
            x.style.display = "none";
            btn.innerHTML = "Show Recommended Items";
        }
    }

    function newList() {
        var cartItems = document.getElementsByClassName('cart-items')[0]
        cartItems.innerHTML = "";
    }
</script>

<script type="text/javascript">
    $(function() {
        $("#search").autocomplete({
            source: 'autocomplete.php',
        });
    });
</script>

</html>