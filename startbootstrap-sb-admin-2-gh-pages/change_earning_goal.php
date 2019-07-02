<?php
include('connection.php');
session_start();

$value = $_POST['newEarnGoal'];
$value /= 1000;

$query = "UPDATE stats SET faturamento = $value WHERE id_stats = 1";
$result = mysqli_query($con, $query);

var_dump($result);

if($result){
  header('location:DVP.php');
}

 ?>
