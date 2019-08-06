<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php
include('connection.php');
session_start();
if(!isset($_SESSION['user'])){
  var_dump($_SESSION);
  header('location:login.php');
}
$user = $_SESSION['user'];
 ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Principal</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

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

<body id="page-top" onload="changeGraphic()">

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
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
                if(!is_null($user['departamento'])){
                    if($user['departamento'] == 'DRH'){
                      echo '<a class="dropdown-item" href="RH.php">';
                      echo '<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>';
                      echo 'RH';
                      echo '</a>';
                  }
                  else if($user['departamento'] == 'DVP'){
                    echo '<a class="dropdown-item" href="DVP.php">';
                    echo '<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>';
                    echo 'DVP';
                    echo '</a>';
                  }
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

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Meta de Faturamento</div>
                    <div id="TOTAL_FATURAMENTO" class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      include('connection.php');
                      $query = "SELECT faturamento FROM stats WHERE id_stats = 1";
                      $result = mysqli_query($con, $query);
                      $fat = mysqli_fetch_array($result, MYSQLI_NUM);
                      echo "".$fat[0]."K";
                     ?>
                   </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Faturamento Atual</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div id="QUANTIDADE_FATURAMENTO" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                            include('graph_functions.php');
                            $amount = billing_amount();
                            $r =  "$amount" . "K";
                            echo "$r";
                          ?>

                        </div>
                      </div>
                      <?php
                        //include('graph_functions.php');
                        $r = billing_amount();
                        $percent_qf = ($r*100)/$fat[0];
                        $style_data = "width:" . $percent_qf . "%;";
                        echo ' <div class="col">';
                        echo      '<div class="progress progress-sm mr-2">';
                        echo        '<div id="PROGRESSO_FATURAMENTO"';
                        echo          'class="progress-bar bg-info"';
                        echo          'role="progressbar"';
                        echo          'style='.$style_data;
                        echo          'aria-valuenow="50"';
                        echo          'aria-valuemin="0"';
                        echo          'aria-valuemax="100"></div>';
                        echo        "</div>";
                        echo      "</div>";
                      ?>
                      <!--
                      <div class="col">
                        <div class="progress progress-sm mr-2">
                          <div id="PROGRESSO_FATURAMENTO" class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      -->
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Meta de Projetos</div>
                    <div id="TOTAL_PROJETOS" class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      include('connection.php');
                      $query = "SELECT projetos FROM stats WHERE id_stats = 1";
                      $result = mysqli_query($con, $query);
                      $proj = mysqli_fetch_array($result, MYSQLI_NUM);
                      echo "".$proj[0];
                     ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Projetos Atuais</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div id="QUANTIDADE_PROJETOS" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                            //include('graph_functions.php');
                            $amount = actual_projects();
                            echo "$amount";
                          ?>
                        </div>
                      </div>
                      <?php
                        //include('graph_functions.php');
                        $qt_projects = actual_projects();
                        $percent_qt = ($qt_projects * 100) / $proj[0];
                        $style_data = "width: " . $percent_qt . "%;";

                        echo ' <div class="col">';
                        echo      '<div class="progress progress-sm mr-2">';
                        echo     '<div id="PROGRESSO_PROJETOS"';
                        echo          'class="progress-bar bg-info"';
                        echo          'role="progressbar"';
                        echo          'style='.$style_data;
                        echo          'aria-valuenow="50"';
                        echo          'aria-valuemin="0"';
                        echo          'aria-valuemax="100"></div>';
                        echo        "</div>";
                        echo      "</div>";
                      ?>
                      <!--
                      <div class="col">
                        <div class="progress progress-sm mr-2">
                          <div id="PROGRESSO_PROJETOS" class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      -->
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>

        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafico de Faturamento</h6>-
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                  </a>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3   d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Escalonamento da Semana</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Concluído
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Pendente
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a> -->

          <!-- Content Column -->
          <div class="col-lg-5">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quem esta na sede:</h6>
              </div>
              <?php

                if ($user['id_usuario'] != null){
                  $query1 = 'select nome, id_usuario, count(*) as quantidade from escalonamento join usuario using(id_usuario) group by id_usuario having count(*) % 2 = 1';
                  $result1 = mysqli_query($con, $query1);

                  while ($row = mysqli_fetch_array($result1)) {
            
                    echo '<div class="card-body">';
                      echo '<img src="img/Avatar1.png" width="45px">';
                      echo '<span class="nome">'.$row['nome'].'</span>';
                      echo '<a href="denuncia.php?id_denunciador='.$user['id_usuario'].'&id_denunciado='.$row['id_usuario'].'" class="d-none d-sm-inline-block btn btn-danger ">';
                      echo '<span class="icon text-white"> <i class="fas fa-exclamation-triangle"></i> Não está na sede! </span>';
                      echo '</a>';
                      echo '<a href="denuncia.php?id_denunciador='.$user['id_usuario'].'&id_denunciado='.$row['id_usuario'].'" class="btn-mobile d-sm-none d-inline-block btn btn-danger btn-circle">'
                      echo '<i class="fas fa-exclamation-triangle"></i>'
                      echo '</a>'
                    echo '</div>';
                  }
                }
              ?>
            </div>
          </div>

          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Atuais Diretores</h6>
              </div>
              <div class="card-body">
                <div class="text-left">
                  <img class="foto img-fluid" src="img/cord1.png" width="90px">
                </div>
                <div class="escrita text-left">
                  <h5>Presidencia</h5><span>Dom</span>
                </div>
              </div>
              <div class="card-body">
                <div class="text-left">
                  <img class="foto img-fluid" src="img/cord2.png" width="90px">
                </div>
                <div class="escrita text-left">
                  <h5>Vice-Presidencia</h5><span>Gus</span>
                </div>
              </div>
              <div class="card-body">
                <div class="text-left">
                  <img class="foto img-fluid" src="img/cord3.png" width="90px">
                </div>
                <div class="escrita text-left">
                  <h5>Projetos</h5><span>Iago</span>
                </div>
              </div>
              <div class="card-body">
                <div class="text-left">
                  <img class="foto img-fluid" src="img/cord4.png" width="90px">
                </div>
                <div class="escrita text-left">
                  <h5>Marketing</h5><span>Thiago</span>
                </div>
              </div>
              <div class="card-body">
                <div class="text-left">
                  <img class="foto img-fluid" src="img/cord5.png" width="90px">
                </div>
                <div class="escrita text-left">
                  <h5>RH</h5><span>Mari Maravilha</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->


    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <form action="iamhere.php" type="POST" enctype="multipart/form-data">
            <span>Desafio Trainee NPCP 2019</span>
            <input type="hidden" value="<?php  $user['id_usuario'] ?>" name="id">
            <input id="bt_iamhere" type="submit" style="margin-left: 30px" class="btn btn-primary" data-dismiss="modal" value="Estou aqui  / Sair da Sede"/>
          </form>
          <?php
            if ($user['id_usuario'] != null) {
              
              $query2 = 'select nome, id_usuario, count(*) as quantidade from escalonamento join usuario using(id_usuario) group by id_usuario having count(*) % 2 = 1';
              $result2 = mysqli_query($con, $query1);
              
              if (mysqli_fetch_array($result2) != null) {
                echo '<form action="iforgot.php" type="POST" enctype="multipart/form-data">';
                  echo '<input id="caralho" type="hidden" value="<?php '.$user['id_usuario'].' ?>"name="id">';
                  echo '<input id="bt_iforgot" type="submit" style="margin-left: 30px; margin-top: 30px" class="btn btn-secondary" data-dismiss="modal" value="Esqueci de sair da Sede!"/>';
                echo '</form>';
              }
            }
          ?>
        </div>
      </div>

    </footer>

    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione sair para ficar offline</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!--CONFIRMAÇAO DE DENUNCIA-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script type="text/javascript">
    function changeGraphic(){
      let a = document.getElementById('QUANTIDADE_FATURAMENTO');
      let b = document.getElementById('PROGRESSO_FATURAMENTO');
      let c = document.getElementById('TOTAL_FATURAMENTO');

      let d = document.getElementById('QUANTIDADE_PROJETOS');
      let e = document.getElementById('PROGRESSO_PROJETOS');
      let f = document.getElementById('TOTAL_PROJETOS');

      b.style.width = ((a.innerText / c.innerText) * 100 ) + "%";
      e.style.width = ((d.innerText / f.innerText) * 100 ) + "%";
    }

  </script>



</body>

</html>
