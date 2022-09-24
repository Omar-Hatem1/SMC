<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include './nav1.php';
$error = "";
$errorColor = "";
if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = "SELECT * FROM admins WHERE email ='$email' AND `password` = '$password'";
    $query  = mysqli_query($connection, $result);
    $numRows = mysqli_num_rows($query);

    $row = mysqli_fetch_assoc($query);
    if ($numRows == 1) {
        $_SESSION['admins'] = [
            'email' => $email
        ];
        header("location: /Registeration/index.php");
    } else {
        $errorColor = "red";
    }
}

?>
<h1 class="text-center"> Login </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Admin E-mail : <span class="text-danger"><?= $error ?></span></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="">Admin Password <span class="text-danger"><?= $error ?></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control" type="password" name="password">
                </div>

                <button name="login" class="btn btn-info"> login </button>

            </form>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php'
?>
