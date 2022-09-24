<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';
if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
if (isset($_POST['submit'])) {
    $id = $_GET['updateid'];
    $name = $_POST['dep'];
    $update = "UPDATE `department` SET dep='$name' WHERE id = $id";
    $query = mysqli_query($connection, $update);
    path('department/printDep.php');
}
?>

<div class="container my-5">
    <form method="POST">
        <div class="form-group" name="dep">
            <label for="dep">New Department</label>
            <input type="text" class="form-control" name="dep">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<?php
include '../shared/footer.php';
?>