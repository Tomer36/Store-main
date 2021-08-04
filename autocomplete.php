<?php
include 'dbConnection.php';


function get_items($conn, $term)
{
	$query = "SELECT * FROM list WHERE title LIKE '%" . $term . "%' ORDER BY title ASC";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $data;
}

if (isset($_GET['term'])) {
	$getItem = get_items($conn, $_GET['term']);
	$itemList = array();
	foreach ($getItem as $item) {
		$itemList[] = $item['title'];
	}
	echo json_encode($itemList);
}
