<?php
include 'db.php';

if(isset($_POST['id'])){

// $id = $_POST['id'];

$sql = "SELECT * FROM `crud` WHERE id = $id";
$result = $db->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);
}


?>
