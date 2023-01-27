<?php 
include 'db.php';

$sql = "SELECT * FROM `crud` where id='$_POST[id]'";
$result = $db->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);
?>