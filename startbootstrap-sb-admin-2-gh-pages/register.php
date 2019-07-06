
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cadastro</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body class="bg-gradient-primary">

  <style>
    .erromudar {
      color: red;
      font-weight: bold;
    }

    .img-fluid {
      position: relative;
      left: 60px;
      top: 190px;
      max-height: 380px;
    }

    .h4 {
      font-weight: bold;
    }

    .card {
      border-radius: 70px;
    }
    .bg-light {
      background-color: white !important;
    }
     .navbar-nav{
      margin-right: auto;
    }
    .mb-4{
      margin-bottom: 0.5rem!important;
    }
    .form-last{
      margin-bottom: 0.5rem!important;
    }
    .col-last{
      margin-bottom: 0rem!important;
    }
  </style>

  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="img/logo.png" class="img-fluid" alt="Responsive image">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crie uma Conta!</h1>
              </div>
              <form action="register_action.php" method="POST" class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nome" name="nome">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                      placeholder="Sobrenome" name="sobrenome">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" maxlength="11" class="form-control form-control-user" placeholder="Celular" name="telefone">
                  </div>
                  <div class="col-sm-6">
                    <input type="tel" maxlength="11" class="form-control form-control-user" placeholder="CPF" name="cpf">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" maxlength="8" class="form-control form-control-user" placeholder="CEP" name="cep">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Cidade" name="cidade">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" placeholder="Bairro" name="bairro">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Rua" name="rua">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="tel" class="form-control form-control-user" placeholder="Número" name="numero">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" placeholder="Complemento" name="complemento">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                      placeholder="Senha" name="senha">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                      placeholder="Confirmar senha" name="senha2">
                  </div>
                </div>
                <div class="form-last form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="PIN" name="pin">
                  </div>
                  <div class="col-last col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" placeholder="Data de Nascimento" name="nascimento" onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
                  <br><br><br>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user" placeholder="Data de Efetivação" name="efetivacao" onfocus="(this.type='date')" onblur="(this.type='text')">
                  </div>
                </div>
                <br>
                  <div>
                    <select name="cargo" style="border-radius: 10px; width: 250px; height: 50px; font-family:Font Awesome 5 Free;font-style: normal;font-weight: 200;font-display: auto;">
                      <option value="" disabled selected>Cargo</option>
                      <option value="Membro">Membro</option>
                      <option value="Gerente de projetos">Gerente de projetos</option>
                      <option value="Gerente de núcleo">Gerente de núcleo</option>
                      <option value="Diretor">Diretor</option>
                    </select>
                  
                    <select name="nucleo" style="float: right;border-radius: 10px; width: 250px; height: 50px; font-family:Font Awesome 5 Free;font-style: normal;font-weight: 200;font-display: auto;">
                      <option value="" disabled selected>Nucleo</option>
                      <option value="NPC">NPC</option>
                      <option value="NPCA">NPCA</option>
                      <option value="NPCP">NPCP</option>
                      <option value="NPE">NPE</option>
                      <option value="NPQ">NPQ</option>
                      <option value="NPM">NPM</option>
                      <option value="NPP"NPP></option>
                    </select>
                    <br>
                  </div>
                  <nav class="navbar navbar-expand navbar-light bg-light mb-4"></nav>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar-se"/>

                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl, "error=pin") == true){
                      echo "<p class='erromudar' >PIN ERRADO COMPANHEIRO</p>";
                    }
                    else if(strpos($fullUrl, "error=empty") == true){
                      echo "<p class='erromudar' >Algum campo de senha estava vazio</p>";
                    }
                    else if(strpos($fullUrl, "error=wrongpass") == true){
                      echo "<p class='erromudar' >Senhas diferentes!</p>";
                    }
                    else if(strpos($fullUrl, "error=user") == true){
                      echo "<p class='erromudar' >Usuario ja cadastrado</p>";
                    }

                ?>

              </form>
              <hr>

              <div class="text-center">
                <a class="small" href="login.html">Já possui uma conta? Faça o login!</a>
              </div>
            </div>
          </div>
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

</body>

</html>
