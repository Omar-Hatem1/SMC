<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
$curEmail = $_SESSION['admins']['email'];
$printName = "";
$printEmail = "";
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $image_name = time() . $_FILES['adminImage']['name'];
  $tmp_name = $_FILES['adminImage']['tmp_name'];
  $location = "../employee/upload/$image_name";
  move_uploaded_file($tmp_name, $location);
  $update = "UPDATE `admins` SET `name`='$name',email='$email', `image` = '$image_name' WHERE email = '$curEmail'";
  $query = mysqli_query($connection, $update);
  if($query)
    $_SESSION['admins']['email'] = $email;
  path('/admin/printadmin.php');
}



?>
<div class="container my-5">
  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Enter your name" name="name" value=<?= $printName ?>>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" class="form-control" placeholder="Enter your Email" name="email" value=<?= $printEmail ?>>
    </div>
    <div class="form-group">
      <label for="adminImage">Profile Picture</label>
      <input type="file" class="form-control" autocomplete="off" id="adminImage" name="adminImage" required autofocus/>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
</div>
<?php
include '../shared/footer.php';
?>