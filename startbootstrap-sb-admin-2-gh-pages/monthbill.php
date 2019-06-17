<?php

    include("connection.php");
    $bill_month = array();
    $faturamento = 0;
    //Més de janeiro

    $i = 1;
    while($i <= 12){
        $query = "SELECT SUM(`valor`) as valor FROM `faturamento` WHERE YEAR(dia) = 2019 AND MONTH(dia) = ";
        $query .= $i;
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($result)){
            $faturamento += $row['valor'];
        }
        array_push($bill_month, $faturamento);
        $faturamento = 0;
        $i += 1;
    }
    
    //echo $result;
    $bill_month_str = implode("|", $bill_month);
    echo $bill_month_str;
?>