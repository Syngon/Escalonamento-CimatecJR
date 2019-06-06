<?php
include('connection.php');

function billing_amount()
{
  $faturamento = 0;
  $query = "SELECT `valor` FROM `faturamento` WHERE YEAR(data) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $faturamento += $row['valor'];
  }
  
  $faturamento = $faturamento / 1000;
  echo $faturamento; 

}

function actual_projects()
{
  $total = 0;
  $query = "SELECT COUNT(*) FROM `faturamento` WHERE YEAR(data) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $total++;
  }
  echo "$total";
}

function billing_by_month()
{
  $bill_month = array();

  //Més de janeiro
  $query_january = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 1";
  $result_january = mysqli_query($con, $query_january);
  array_push($bill_month, $result_january);
  
  $query_february = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 2";
  $result_february = mysqli_query($con, $query_february);
  array_push($bill_month, $result_february);

  $query_march = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 3";
  $result_march = mysqli_query($con, $query_march);
  array_push($bill_month, $result_march);

  $query_april = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 4";
  $result_april = mysqli_query($con, $query_april);
  array_push($bill_month, $result_april);

  $query_may = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 5";
  $result_may = mysqli_query($con, $query_may);
  array_push($bill_month, $result_may);

  $query_june = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 6";
  $result_june = mysqli_query($con, $query_june);
  array_push($bill_month, $result_june);

  $query_july = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 7";
  $result_july = mysqli_query($con, $query_july);
  array_push($bill_month, $result_july);

  $query_august = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 8";
  $result_august = mysqli_query($con, $query_august);
  array_push($bill_month, $result_august);

  $query_september = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 9";
  $result_september = mysqli_query($con, $query_september);
  array_push($bill_month, $result_september);

  $query_october = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 10";
  $result_october = mysqli_query($con, $query_october);
  array_push($bill_month, $result_october);

  $query_november = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 11";
  $result_november = mysqli_query($con, $query_november);
  array_push($bill_month, $result_november);

  $query_december = "SELECT SUM(`valor`) FROM `faturamento` WHERE YEAR(data) = 2019 AND MONTH(data) = 12";
  $result_december = mysqli_query($con, $query_december);
  array_push($bill_month, $result_december);

  $bill_month_str = implode("|", $bill_month);
  echo $bill_month_str;
}

?>