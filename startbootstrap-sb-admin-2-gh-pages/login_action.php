<?php
include('connection.php');

#Inicia sessão 
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$senha = md5($senha);

$query = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha`= '$senha'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result)){
    header('location:home.php?id='.$row['id_usuario'].'&nome='.$row['nome']);
  }

}
else
{
  echo 'Login ou senha errado!';
}
 ?>
