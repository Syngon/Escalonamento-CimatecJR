<?php
include('connection.php');

session_start();

$email = $_POST['email'];

$query = "SELECT id_usuario FROM `usuario` WHERE `email` = '$email'";
$result = mysqli_query($con, $query);

$id = mysqli_fetch_assoc($result);



if(!$id){
    echo "FUDEU BAHIA";
}
else{
    if(mail($email, "Esqueci minha senha", "" )){
         header('location:login.php');
    }
    else{
        echo "Erro";
    }

}

 ?>
