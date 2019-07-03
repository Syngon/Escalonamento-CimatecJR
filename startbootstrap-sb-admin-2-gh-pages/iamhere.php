<?php

    $host = 'localhost'; //fieb.org

    function get_ip(){
        //echo $_SERVER['REMOTE_ADDR'];
        return $_SERVER['HTTP_HOST'];
    }

    if (get_ip() == $host) {
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

    }
    else {
        echo '<p>Você não está no senai<p>';
    }

    

?>
