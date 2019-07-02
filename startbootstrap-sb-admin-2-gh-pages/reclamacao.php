<?php
include("connection.php");
session_start();

$tipo = isset($_POST['opcao']) ? $_POST['opcao'] : false;
$id = isset($_POST['id']) ? $_POST['id'] : false;
$date = date('Y-m-d', strtotime($_POST['date']));

$query = "INSERT INTO reclamacao(id_reclamado, tipo, dia_enviado, dia_ocorrido) VALUES('$id', '$tipo', '".date('Y-m-d')."', '$date')";
var_dump($query);
$result = mysqli_query($con, $query) or die(mysqli_error($con));
if($result)
{
  header('location:RH.php');
}



 ?>
