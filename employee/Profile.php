<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
if (isset($_GET['profile'])) {
    $id = $_GET['profile'];
    $result = "SELECT * FROM `employee` WHERE id = $id";
    $query = mysqli_query($connection,  $result);
    $row = mysqli_fetch_assoc($query);
}

?>
<h1 class="text-center"> Employees : <?= $row['id'] ?></h1>
<div class="container col-md-3 mt-5">
    <div class="card">
    <img src="./upload/<?= $row['image'] ?>" class="img-card-top" alt="">
        <div class="card-body">
            <h6>Name :<?= $row['name'] ?></h6>
            <h6>salary :<?= $row['salary'] ?></h6>

        </div>
    </div>

</div>

<?php

include '../shared/footer.php'
?>
