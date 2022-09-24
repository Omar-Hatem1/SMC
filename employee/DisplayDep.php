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
        <button class = "btn btn-primary my-5"><a href = "/Registeration/index.php" class = "text-light"> Add Employee </a> </button>
    <table class="table table-striped table-dark">
  <thead>
    <tr style="text-align: center;">
      <th scope="col" >id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">salary</th>
      <th scope="col">department</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $print = "SELECT * FROM `display`";
    $result = mysqli_query($connection, $print);
    if($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['empId'];
        $name = $row['empName'];
        $email = $row['email'];
        $salay = $row['salary'];
        $depName = $row['depName'];

        echo '<tr style="text-align: center;">
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$salay . '$'. '</td>
        <td>'.$depName.'</td>
        <td>
        <button class="btn btn-primary" ><a href="UpdateEmp.php?updateid='.$id.'" class = "text-light">Update</a></button>
        <button class="btn btn-danger"><a href="DeleteEmp.php?deleteid='.$id.'" class = "text-light">Delete</a></button>
        <button class="btn btn-info"><a href="Profile.php?profile='.$id.'" class = "text-light">Show</a></button>
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