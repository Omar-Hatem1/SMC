<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if (!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}

if (isset($_GET['updateid'])) {
  $id = $_GET['updateid'];
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $salary = $_POST['salary'];
    $dep_id = $_POST['dep_id'];
    $image_name = time() . $_FILES['empImage']['name'];
    $tmp_name = $_FILES['empImage']['tmp_name'];
    $location = "../employee/upload/$image_name";
    move_uploaded_file($tmp_name, $location);
    $update = "UPDATE `employee` SET `name`='$name',`email`='$email',`pass`='$password',`salary`='$salary',`image`='$image_name' WHERE id = $id";
    $query = mysqli_query($connection, $update);
    path('employee/UpdateEmp.php');
  }
}



?>
<div class="container my-5">
  <form method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" placeholder="Enter your name" name="name">
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" class="form-control" placeholder="Enter your Email" name="email">
    </div>

    <div class="form-group">
      <label>Salary</label>
      <input type="text" class="form-control" placeholder="Enter your Salary" name="salary">
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Enter your Password" name="pass">
    </div>

    <div class="form-group">
      <label for="dep_id">Department</label>

      <select class="form-control" name="dep_id" id="dep_id" required>
        <?php
        $depart = "SELECT * FROM `department`";
        $query = mysqli_query($connection, $depart);
        ?>
        <?php foreach ($query as $data) { ?>
          <option value="<?= $data['id'] ?>"> <?= $data['dep'] ?> </option>
        <?php } ?>
      </select>
      <div class="form-group">
        <label for="empImage">Profile Picture</label>
        <input type="file" class="form-control" autocomplete="off" id="empImage" name="empImage" required autofocus />
      </div>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
</div>
<?php
include '../shared/footer.php';
?>