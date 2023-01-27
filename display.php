
<?php
include 'db.php';

echo '<thead>
        <tr>
        <th scope="col">S.No</th>
        <th scope="col ">Name <i class="fa-solid fa-user"></i></th>
        <th scope="col">Email <i class="fa-solid fa-envelope"></i></th>
        <th scope="col">Phone <i class="fa-solid fa-phone"></i></th>
        <th scope="col">Action</th>
        </tr>
     </thead>';

$sql = "SELECT * FROM `crud`";
$result = $db->query($sql);
$number = 1;
while ($row = $result->fetch_assoc()) {


echo '<tr>       
        <td scope="row" >' . $number . '</td>         
        <td scope="row">' . $row['name'] . '</td>
        <td scope="row">' . $row['email'] . '</td>
        <td scope="row">' . $row['phone'] . '</td>
        <td>
            <button type="button" class="btn btn-dark edit" data-bs-toggle="modal" data-bs-target="#UpdateModal" data-id="'.$row['id'].'"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="btn btn-danger delete" data-id="'.$row['id'].'"><i class="fa-solid fa-trash"></i></button>   
        </td>
        
        </tr>';
        $number++;
}


?>


