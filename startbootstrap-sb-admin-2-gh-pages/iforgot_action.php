<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
    <script src="map.js">
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBftsY-ck6WiPQQ2pdwM2CzUUtt3QDkzZY&callback=initMap">
    </script>

<?php

    $host = 'fieb.org'; //fieb.org

    function get_ip(){
        //echo $_SERVER['REMOTE_ADDR'];
        return $_SERVER['HTTP_HOST'];
    }

    if (get_ip() != $host) {
        include('connection.php');
        session_start();

        date_default_timezone_set('America/Sao_Paulo');

        $time_now = date('H:i:s');

        if(!isset($_SESSION['user'])){
            var_dump($_SESSION);
            header('location:login.php');
        }
        $user = $_SESSION['user'];

        $date = $_GET['date_insert'];
        $time = $_GET['time_insert'];
        
        if ($time < $time_now){
            $query = "INSERT INTO escalonamento(id_usuario, horario) values (";
            $query .= $user['id_usuario'];
            $query .= ", '";
            
            $query .= $date;
            $query .= " ";
            $query .= $time;
            $query .= ":00');";
            echo $query;
            if (mysqli_query($con, $query)) {
                header("location:home.php");
            }
        }
        else {
            echo '<p>Data inválida<p>';
        }
    }
    else {
        echo '<p>Você não está no senai<p>';
    }
?>