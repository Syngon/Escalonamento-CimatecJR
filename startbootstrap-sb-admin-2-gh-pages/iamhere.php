<?php
    include('connection.php');
    session_start();
    
    $query = "INSERT INTO escalonamento(id_usuario, horario) VALUES (";
    $query .= $id;
    $query .= ", now())";

    if (mysqli_query($con, $query)) {
        echo '<p>Atualizado</p>';
        header("location:home.php?id=" .$user['id_usuario']);
    }
?>
