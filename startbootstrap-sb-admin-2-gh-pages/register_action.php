<?php
include('connection.php');

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$rua = $_POST['rua'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$pin = $_POST['pin'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];

if($pin != 123)
{
    echo "PIN ERRADO COMPANHEIRO";
}

else if(empty($senha) || empty($senha2))
{
  echo "Algum campo de senha esta vazio";
}

else if($senha != $senha2)
{
  echo 'Senhas diferentes!';
}

else
{
    $senha = md5($senha);

    if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'")) > 0)
    {
        echo "Usuario ja cadastrado";
    }

    //Query para inserir o endereco
    mysqli_query($con, "INSERT INTO endereco(rua, cep, numero, complemento, bairro, cidade) VALUES('$rua', '$cep', '$numero', '$complemento', '$bairro', '$cidade') ");
    //Pegar id_endereco para colocar no Usuario
    $endereco =mysqli_insert_id($con);

    $query = "INSERT INTO usuario(nome, sobrenome, email, senha, telefone, cpf, endereco) VALUES('$nome', '$sobrenome', '$email', '$senha', '$telefone', '$cpf', '$endereco')";
    $result = mysqli_query($con, $query);

    if($result)
    {
      header('location:login.html');
    }

}

 ?>
