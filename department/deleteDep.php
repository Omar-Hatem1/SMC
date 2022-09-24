<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete = "DELETE FROM `department` WHERE id = $id";
    $result = mysqli_query($connection, $delete);
    if ($result) {
        path('department/printDep.php');
    } else {
        echo 'this department included with employees';
    }
}

?>
    <?php
include '../shared/footer.php';
?>