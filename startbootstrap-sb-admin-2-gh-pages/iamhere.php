<?php
    include('connection.php');


    if(isset($_GET['id'])){
        $id = $_GET ['id'];
    }   
    //$id = $_POST['id'];

    $query = "INSERT INTO escalonamento(id_usuario, horario) VALUES (";
    $query .= $id;
    $query .= ", now())";

    if (mysqli_query($con, $query)) {
        echo '<p>Atualizado</p>';
        header("location:home.php?id=" .$id);
    }
?>