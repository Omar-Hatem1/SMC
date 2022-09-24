<?php 
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
?>
<div class = "container my-5">
<table class="table table-striped table-dark">
  <thead>
    <tr style="text-align: center;">
      <th scope="col">department id</th>
      <th scope="col">department name</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $print = "SELECT * FROM `department`";
    $result = mysqli_query($connection, $print);
    if($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $depName = $row['dep'];
        echo '<tr style="text-align: center;">
        <th scope="row">'.$id.'</th>
        <td>'.$depName.'</td>
        <td>
        <button class="btn btn-primary" ><a href="UpdateDep.php?updateid='.$id.'" class = "text-light">Update</a></button>
        <button class="btn btn-outline-danger"><a href="deleteDep.php?deleteid='.$id.'" class = "text-light">Delete</a></button>
        </td>
      </tr>'; 
    }
   }
    ?>
    
  </tbody>
    </table>
    </div>
    <?php
include '../shared/footer.php';
?>