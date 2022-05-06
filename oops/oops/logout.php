<?php 

$con=mysqli_connect("localhost","root","","deepak");
session_start();

session_unset();

session_destroy();

header("location:admin_login.php")

?>