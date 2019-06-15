<?php
  include("connection.php");
  if(isset($_GET['id_denunciador'])){
    $id_denunciador = $_GET ['id_denunciador'];
  }
  if(isset($_GET['id_denunciado'])){
    $id_denunciado = $_GET ['id_denunciado'];
  }

  $query = "INSERT INTO denuncia(denunciador, denunciado) VALUES('$id_denunciador', '$id_denunciado')";
  $result = mysqli_query($con, $query);
  if($result){
    header("location:home.php?id=$id_denunciador");
  }

 ?>
