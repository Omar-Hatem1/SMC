<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(!$_SESSION['admins']) {
  header("location: /Registeration/admin/admins.php");
}
if(isset($_POST['click'])) {
    $dep_name = $_POST['dep'];
    $query = "INSERT INTO `department` VALUES('null', '$dep_name')";
    $result = mysqli_query($connection, $query);

}

?>

    <div class = "container my-3">
        <div class = "row justify-content-center">
            <div class = "card mt-5">
                <div class = "card-header">
                    <h4>Insert the Needed Department</h4>
                </div>
                <div class = "card-body">
                    <form action = "" method = "POST">
                        <div class="form-group">
                            <label for = "">Department Name</label>
                            <input type = "text" name = "dep" class = "form-control" required>
                        </div>
                        <div class="form-group">
                            <button type = "submit" name = "click" class = "btn btn-primary">insert</button>
                            <button type="submit" class="btn btn-primary" name = "goback"><a href = "index.php" class = "text-light"> Back </a> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
include '../shared/footer.php';
?>