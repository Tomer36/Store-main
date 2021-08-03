<?php
	include 'dbConnection.php';
	$title=$_POST['title'];
	$qty=$_POST['qty'];
	$sql = "UPDATE `list` 
	SET `title`='$title',
	`qty`='$qty',
	WHERE title=$title";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
