<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Esqueci de sair da sede</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<?php 
    include('connection.php');
    session_start();

    if(!isset($_SESSION['user'])){
        var_dump($_SESSION);
        header('location:login.php');
    }
    $user = $_SESSION['user'];
  
?>
<style type="text/css">
  .container-logo {
    width: 45px;
  }

  .nome {
    position: relative;
    margin-left: 10px;
    font-size: 1.5em;
    top: 5px;
  }

  .fa-exclamation-triangle {
    position: relative;
    margin-left: -1px;
  }

  .btn-danger {
    float: right;
    position: relative;
    margin-top: 3px;
  }

  .escrita {
    position: relative;
    margin-left: 100px;
    margin-top: -70px;
  }

  .logomarca {
    width: 45px;
  }
</style>
<body>
<nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow navbar-inverse">
        <a class="container-logo container-fluid" href="home.php"><img src="img/engbranco.png" class="logomarca"></a>

        <!-- Topbar Navbar -->
        <div class="container-fluid">

          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">
                  <?php
                  $query = 'select count(*) as cont from reclamacao where id_reclamado ='.$user['id_usuario']." AND YEAR(dia_ocorrido) >= ".date('Y');
                  $result = mysqli_query($con, $query);
                  if($result != null){
                    while ($row = mysqli_fetch_array($result)) {
                      echo $row['cont'];
                    }
                  }
                   ?>
                   +</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificação
                </h6>
                <?php
                $query = "select id_reclamado, tipo, DAY(dia_ocorrido) as dia, MONTH(dia_ocorrido) as mes, YEAR(dia_ocorrido) as ano from reclamacao where id_reclamado =".$user['id_usuario']." AND YEAR(dia_ocorrido) >= ".date('Y');
                $result = mysqli_query($con, $query);
                $cont = 0;
                while ($row = mysqli_fetch_array($result)) {
                  $mes = "";
              		switch($row['mes']){
              			case"1":  $mes = "Janeiro";     break;
              			case"2":  $mes = "Fevereiro"; 	break;
              			case"3":  $mes = "Março";   	break;
              			case"4":  $mes = "Abril"; 	 	break;
              			case"5":  $mes = "Maio";  		break;
              			case"6":  $mes = "Junho";   	break;
              			case"7":  $mes = "Julho";       break;
              			case"8":  $mes = "Agosto";      break;
              			case"9":  $mes = "Setembro"; 	break;
              			case"10": $mes = "Outubro"; 	break;
              			case"11": $mes = "Novembro";   	break;
                    case"12": $mes = "Dezembro";  	break;
                    $cont++;
                  }


                  echo '<a class="dropdown-item d-flex align-items-center" href="#">';
                    echo '<div class="mr-3">';
                      echo '<div class="icon-circle bg-primary">';
                        echo '<i class="fas fa-file-alt text-white"></i>';
                      echo '</div>';
                    echo '</div>';
                    echo '<div>';
                      echo '<div class="small text-gray-500">'.$row['dia'].' de '.$mes.', '.$row['ano'].'   </div>';
                      echo '<span class="font-weight-bold">'.$row['tipo'].'</span>';
                    echo '</div>';
                  echo '</a>';
                  if($cont >= 3){
                    echo "<script type='text/javascript'>alert('VOCÊ POSSUI 3 OU MAIS ADVERTÊNCIAS, FAVOR PROCURAR O RH');</script>";
                  }
                  
                }
                 ?>

              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                  <?php
                  echo '<span class="."mr-2 d-none d-lg-inline text-white small>'.$user['nome'].'&nbsp&nbsp&nbsp</span>';
                  ?>

                <img class="img-profile rounded-circle" src="img/atari.png" width="40px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php
                    if($user['nucleo'] == 'DRH'){
                      echo '<a class="dropdown-item" href="RH.php">';
                      echo '<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>';
                      echo 'RH';
                      echo '</a>';
                  }
                  else if($user['nucleo'] == 'DVP'){
                    echo '<a class="dropdown-item" href="DVP.php">';
                    echo '<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>';
                    echo 'DVP';
                    echo '</a>';
                  }

                 ?>

                <a class="dropdown-item" href="mudar.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mudar senha
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

      </nav>
      <!-- End of Topbar -->
    
    <div class="card shadow mb4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Esqueci de sair da sede</h6>
            <p style="margin-top: 10px" class="m-0 text-secondary">Se você saiu da sede e se esqueceu de marcar, insira aqui o horário que você saiu.</p>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <form name="formzao" action="iforgot_action.php" type="GET" enctype="multipart/form-data">
                    <div style="margin-top: 16px">
                        <input type="date" placeholder="Data" id="date_insert" name="date_insert" required>
                        <input type="time" id="time_insert" name="time_insert"  required>
                    </div>
                        <input style="margin-top: 20px" id="bt_iamhere" type="submit" style="margin-left: 30px" class="btn btn-primary" data-dismiss="modal" value="Marcar saída da sede"/>
                    </form>
                </div>
            </div>
                
        </div>
    </div>

    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Desafio Trainee NPCP 2019</span>
        </div>
      </div>
    </footer>

      <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>


