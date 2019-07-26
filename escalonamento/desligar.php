<?php
include("connection.php");
session_start();

$id = $_POST['id_usuario'];
$query = "update usuario set data_desligamento = date(now()) where id_usuario = ".$id;



if(mysqli_query($con, $query)){
    header("location:RH.php");
}

?>