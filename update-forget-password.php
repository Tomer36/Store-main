<?php
if (isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']) {
    include 'dbConnection.php';
    $emailId = $_POST['email'];
    $token = $_POST['reset_link_token'];
    $password = ($_POST['password']);
    $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `reset_link_token`='" . $token . "' and `Email`='" . $emailId . "'");
    $row = mysqli_num_rows($query);
    if ($row) {
        mysqli_query($conn, "UPDATE users set  pass_word='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE Email='" . $emailId . "'");
        echo '<p>Congratulations! Your password has been updated successfully.</p>';
        header("Location: Sign_up.php");
        exit();
    } else {
        echo "<p>Something goes wrong. Please try again</p>";
        header("Location: Sign_in.php");
        exit();
    }
}
