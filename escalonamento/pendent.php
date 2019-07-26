<?php

    include('connection.php');  
    session_start();

    $schedule_array = array();
    $time_spent_array = array();
    $time_spent = 0;

    if(!isset($_SESSION['user'])){
        var_dump($_SESSION);
        header('location:login.php');
    }

    $user = $_SESSION['user'];

    $query = "select time(t.horario) as horario from escalonamento t where horario between date_sub(now(), interval 7 day) and now() and t.id_usuario = ";
    $query .=  $user['id_usuario'];
    $query .= " order by horario;";

    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
        array_push($schedule_array, $row['horario']);
    }

    $odd = (count($schedule_array) % 2 == 0 ? 0 : 1);

    for ($i=0; $i < count($schedule_array) - $odd; $i+=2) { 
        $time_spent += (strtotime($schedule_array[$i+1]) - strtotime($schedule_array[$i]));
    }

    $time_spent /= 60;
    $time_spent = number_format((float)$time_spent, 2, '.', '');

    if ($time_spent >= 100) {
        $time_spent_array = [0, $time_spent];
    }
    else{
        $time_spent_array = [(100 - $time_spent), $time_spent];
    }

    $time_spent_str = implode("|", $time_spent_array);
    echo $time_spent_str;
?>