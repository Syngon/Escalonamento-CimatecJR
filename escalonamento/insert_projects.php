<?php
include('connection.php');
session_start();

$name = $_POST['name'];
$value = $_POST['value'];
$date = $_POST['date'];

$query = "INSERT INTO faturamento(nome, valor, dia) VALUES('$name', '$value', '$date')";
$result = mysqli_query($con, $query);

if($result){
  header('location:DVP.php');
}

 ?>
