<?php

include("connection.php")
session_start();

$id = $_POST['id'];
$dpt = $_POST['departamento'];
var_dump($id);
var_dump($dpt);

$query = "update usuario set departamento = '".$dpt."' where id_usuario = ".$id;
$result = mysqli_query($con, $query);
var_dump($result);
if($result){
    //header('location:RH.php);
}

?>