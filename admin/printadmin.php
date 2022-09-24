<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include './nav1.php';

if (!$_SESSION['admins']) {
    header("location: /Registeration/admin/admins.php");
}
$email = $_SESSION['admins']['email'];
$result = "SELECT * FROM `admins` WHERE email = '$email'";
$query = mysqli_query($connection,  $result);
$row = mysqli_fetch_assoc($query);
?>
<h1 class="text-center"> Employees : <?= $row['id'] ?></h1>
<div class="container col-md-3 mt-5">
    <div class="card">
        <img src="../employee/upload/<?= $row['image'] ?>" class="img-card-top" alt="">
        <div class="card-body">
            <h6>Name :<?= $row['name'] ?></h6>
            <h6>E-mail :<?= $row['email'] ?></h6>

        </div>
    </div>
    <button class = "btn btn-outline-light my-3"> <a href="/Registeration/admin/editAdmin.php">Edit</a> </button>
</div>

<?php

include '../shared/footer.php'
?>