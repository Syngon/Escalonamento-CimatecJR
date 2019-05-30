<?php
include('connection.php');

session_start();
   
$email = $_POST['email'];

$query = "SELECT * FROM `usuario` WHERE `email` = '$email'";
$result = mysqli_query($con, $query);

echo "".$result;

 ?>
