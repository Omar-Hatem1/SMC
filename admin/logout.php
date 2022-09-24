<?php 
session_start();
session_unset();
session_destroy();
header("location: /Registeration/admin/admins.php");
?>