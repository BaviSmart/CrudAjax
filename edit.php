<?php 
include 'db.php';

// print_r($_POST);

if(isset($_POST['name'])){
    extract($_POST);

    $sql = "update `crud` set `name`='$name',`email`='$email',`phone`='$phone' where id='$id'";
    if($db->query($sql)){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Data Updated Successfully!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo "Data Not updated";
    }
}
