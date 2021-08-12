<?php
include 'dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Family Members List</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles.css" />
	<script src="store.js" async></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/family-ajax.js"></script>
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
		</div>
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
	</header><br><br>
	<div class="container">
		<p id="success"></p>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Family Members<b> List</b></h2>
					</div>
					<div class="col-sm-6">
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
							</span>
						</th>
						<th>ID</th>
						<th>Email</th>
						<th>Family</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$result = mysqli_query($conn, "SELECT * FROM users");
					$i = 1;
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr id="<?php echo $row["id"]; ?>">
							<td>
							</td>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["Email"]; ?></td>
							<td><?php echo $row["family_list"]; ?></td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal">
									<i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["id"]; ?>" data-email="<?php echo $row["Email"]; ?>" data-family="<?php echo $row["family_list"]; ?>" title="Edit"></i>
								</a>
							</td>
						</tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<footer class="main-footer">
		<div class="container main-footer-container">
			<h4 class="band-name">L&T © 2021 All Rights Reserved</h4>

		</div>
	</footer>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">
						<h4 class="modal-title">Edit Family Member</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>
						<div class="form-group">
							<label>Family List Number</label>
							<input type="text" id="family_u" name="family" class="form-control" required>
						</div>
						<div class="modal-footer">
							<input type="hidden" value="2" name="type">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<button type="button" class="btn btn-info" id="update">Update</button>
						</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>