<?php
include('connection.php');

session_start();

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $newPass = $_POST['newPass'];
  $newPass2 = $_POST['newPass2'];

  if(empty($newPass2) || empty($newPass2) || empty($email) || empty($pass)){
      header('location:mudar.php?error=emptyinput');
  }

  $newPass = md5($newPass);
  $newPass2 = md5($newPass2);
  $pass = md5($pass);

  $query = "SELECT senha FROM `usuario` WHERE `email` = '$email'";
  $result = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($result)) {

    if(!empty($row['senha'])){
        if($pass != $row['senha']){
          header('location:mudar.php?error=oldpass');
        }
    }

    if($newPass != $newPass2){
      header('location:mudar.php?error=difnewpass');
      }
    else{
      $query = "UPDATE usuario SET senha = '$newPass' WHERE email = '$email'";
      $result = mysqli_query($con, $query);

      if($result){
        header('location:home.html');
      }
      else{
        header('location:mudar.php?error=errorconnection');
      }
    }
  }
}







 ?>
