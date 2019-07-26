<!DOCTYPE html>
<html lang="pt-br">

<head>

  <?php
  include('connection.php');
  session_start();
  if(!isset($_SESSION['user'])){
    var_dump($_SESSION);
    //header('location:login.php');
  }
  $user = $_SESSION['user'];
   ?>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RH</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <style type="text/css">
    .container-logo {
      width: 45px;
    }

    .logomarca {
      width: 45px;
    }
    .pad {
        padding: 5%;
    }

    .col-lg-9 {
        margin-right: auto;
        margin-left: auto;
    }

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

    .body {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0;
    }

    .box {
        display: flex;
        width: 200px;
        height: 200px;
        position: relative;
        margin-right: auto;
        margin-left: auto;
    }

    .avatar::after {
        opacity: 0;
        font-family: FontAwesome;
        content: "\f040";
        color: #fff;
        font-size: 2.5rem;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 4px;
        left: 4px;
        width: 92px;
        height: 92px;
        z-index: 2;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        cursor: pointer;
        transition: 350ms ease-in-out;
    }

    .avatar:hover::after {
        opacity: 1;
    }

    .avatar {
        box-sizing: border-box;
        border-radius: 50%;
        overflow: hidden;
        width: 100%;
    }

    .menu {
        position: absolute;
        opacity: 0;
        width: 100px;
        height: auto;
        background-color: #fff;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);
        box-sizing: border-box;
        padding: 0.5rem;
        border-radius: 0.5rem;
        top: 60%;
        left: 60%;
        z-index: -1;
        transition: 350ms ease-in-out;
    }

    .box input {
        display: none;
    }

    .box input:checked+div.menu {
        opacity: 1;
        z-index: 999;
    }
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow navbar-inverse">
          <a class="container-logo container-fluid" href="home.php"><img src="img/engbranco.png"
              class="logomarca"></a>
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
                  $query = 'select id_reclamado, tipo, DAY(dia_ocorrido) as dia, MONTH(dia_ocorrido) as mes, YEAR(dia_ocorrido) as ano from reclamacao where id_reclamado ='.$user['id_usuario']." AND YEAR(dia_ocorrido) >= ".date('Y');
                  $result = mysqli_query($con, $query);

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
                  }
                   ?>

                </div>
              </li>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-white small">
                    <?php
                        echo "<span class="."mr-2 d-none d-lg-inline text-white small>".$user['nome']."</span>";
                    ?>
                  </span>
                  <img class="img-profile rounded-circle" src="img/atari.png" width="40px">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3   d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Área do Administrador</h6>
                    </div>

                    <div class="col-lg-9">
                        <div class="pad">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editor de Metas</h1>
                            </div>
                            <form action="change_project_goal.php" method="POST" id="user" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control" placeholder="Nova Meta de Projetos" name="newProjectGoal">
                                    </div>
                                    <div class="col-sm-6">
                                    <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                                    </div>
                                </div>
                            </form>
                            <form action="change_earning_goal.php" method="POST" id="user" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control" placeholder="Nova Meta de Faturamento" name="newEarnGoal">
                                    </div>
                                    <div class="col-sm-6">
                                    <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-4">
                                <h1 class="h4 text-gray-900 mb-4">Novo Projeto</h1>
                            </div>
                            <form action="insert_projects.php" method="POST" id="user" class="user">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault03">Nome do Projeto</label>
                                        <input type="text" class="form-control" id="validationDefault03" placeholder="Nome do Projeto" required name="name">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault04">Valor do Projeto</label>
                                        <input type="number" class="form-control" id="validationDefault04" placeholder="Valor do Projeto" required name="value">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault05">Data</label>
                                        <input type="date" class="form-control" id="validationDefault05" placeholder="Data" required name="date">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
          <a class="btn btn-primary" href="http://www.cimatecjr.com.br/">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
