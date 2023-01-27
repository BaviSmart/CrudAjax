<?php 
include 'db.php';



if(isset($_POST['name'])){
    extract($_POST);
    // print_r($_POST);
    $sql = "INSERT INTO `crud`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
    if($db->query($sql)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Data inserted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Data Not Inserted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>