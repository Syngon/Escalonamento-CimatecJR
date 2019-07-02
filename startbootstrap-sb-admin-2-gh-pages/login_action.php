<?php
include('connection.php');
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);

$query = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha`= '$senha'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result)){
    $_SESSION['user'] = $row;
    var_dump($_SESSION);
    header('location:home.php');
  }

}
else
{
  header('location:login.php?error=error');
}
 ?>
