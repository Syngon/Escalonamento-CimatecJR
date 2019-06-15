<?php
include("connection.php");

$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];

if($senha != $senha2)
{
  header('location:changepass.php?error=error');
}
$senha = md5($senha);
$query = "update usuario set senha = ".$senha;
$result = mysqli_query($con, $query);

if($result)
{
  header('location:login.php');
}

 ?>
