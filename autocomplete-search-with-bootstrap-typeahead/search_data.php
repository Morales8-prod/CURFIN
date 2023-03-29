<?php
include_once("db_connect.php");
$sql = "SELECT * FROM libros WHERE titulo LIKE '%".$_GET['query']."%' LIMIT 20";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$json = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$json[] = $rows["titulo"];
}
echo json_encode($json);
?>