<?php
include('connection.php');
session_start();

$value = $_POST['newProjectGoal'];

$query = "UPDATE stats SET projetos = $value WHERE id_stats = 1";
$result = mysqli_query($con, $query);

if($result){
  header('location:DVP.php');
}

 ?>
