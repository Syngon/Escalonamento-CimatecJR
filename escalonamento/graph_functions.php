<?php
function billing_amount()
{
  include("connection.php");
  $faturamento = 0;
  $query = "SELECT `valor` FROM `faturamento` WHERE YEAR(dia) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $faturamento += $row['valor'];
  }

  $faturamento /= 1000;
  return $faturamento;

}

function actual_projects()
{
  include("connection.php");
  $total = 0;
  $query = "SELECT COUNT(*) as cont FROM `faturamento` WHERE YEAR(dia) = 2019";
  $result = mysqli_query($con, $query);

  while($row = mysqli_fetch_assoc($result)){
    $total = $row['cont'];
  }
  return "".$total;
}

?>
