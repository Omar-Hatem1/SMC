<?php 
$connection = mysqli_connect("localhost", 'root', '', 'odc');
if (!$connection) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>