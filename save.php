<?php
include 'dbConnection.php';
$title = $_POST['title'];
$qty = $_POST['qty'];
session_start();
if (isset($_SESSION["family_list"]))
	if ($_SESSION["family_list"] == '33') {
		$sql = "INSERT INTO `family_list`( `title`, `qty` ) 
	VALUES ('$title','$qty')";
	} else {
		$sql = "INSERT INTO `non_family_list`( `title`, `qty` ) 
	VALUES ('$title','$qty')";
	}
if (mysqli_query($conn, $sql)) {
	echo json_encode(array("statusCode" => 200));
} else {
	echo json_encode(array("statusCode" => 201));
}
mysqli_close($conn);
