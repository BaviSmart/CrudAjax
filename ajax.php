<?php
$db = new mysqli('localhost', 'root', '', 'batch3');

$id = $_POST['id'];

$sql = "SELECT * FROM `crud` WHERE id = $id";
$result = $db->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);


?>