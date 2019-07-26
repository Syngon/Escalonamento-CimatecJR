<?php

    include('connection.php');
    session_start();
    
    if(!isset($_SESSION['user'])){
        var_dump($_SESSION);
        header('location:login.php');
    }
    $user = $_SESSION['user'];

    $query = "INSERT INTO escalonamento(id_usuario, horario) values (";
    $query .= $user['id_usuario'];
    $query .= ", now())";

    if (mysqli_query($con, $query)) {
        header("location:home.php");
    }


    

?>
