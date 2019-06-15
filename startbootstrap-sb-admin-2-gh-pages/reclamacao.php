<?php
include("connection.php");

$tipo = isset($_POST['opcao']) ? $_POST['opcao'] : false;
$idrh = isset($_GET['idrh']) ? $_GET['idrh'] : false;
$sofreu = isset($_GET['sofreu']) ? $_GET['sofreu'] : false;

$query = "INSERT INTO reclamacao(id_reclamado, tipo) VALUES('$sofreu', '$tipo')";
$result = mysqli_query($con, $query);
var_dump($tipo);
var_dump($idrh);
var_dump($sofreu);
var_dump($result);
if($result)
{
  header('location:RH.php?id='.$idrh);
}



 ?>
