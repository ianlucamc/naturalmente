<?php
// echo "Dados do formulário:<br>";
// $email = $_REQUEST['email'];
// $senha = $_REQUEST['senha'];
// echo "Email: $email | Senha: $senha <br>";

@session_start();
$con = conecta();

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$bairro = trim($_POST['bairro']);
$rua = trim($_POST['rua']);
$numero = trim($_POST['numero']);
$cep = trim($_POST['cep']);
$complemento = trim($_POST['complemento']);
$telefone = trim($_POST['telefone']);
$celular = trim($_POST['celular']);
$cidade = trim($_POST['cidade']);

$insert_pessoa = "insert into pessoa (nome, email, senha, bairro, rua, numero, cep, complemento, fone, celular, idCidade) values ('$nome', '$email', '$senha', '$bairro', '$rua', '$numero', '$cep', '$complemento', '$telefone', '$celular', '$cidade')";
$res = mysqli_query($con, $insert_pessoa);

$id = mysqli_query($con, "select idPessoa from pessoa order by 1 desc limit 1");
$iddado = mysqli_fetch_assoc($id);
$idPessoa = $iddado['idPessoa'];
echo $idPessoa;

if (isset($_SESSION['btnProdutor'])) {
  echo $_SESSION['btnProdutor'];
    $cnpj = trim($_POST['cnpj']);
    $ie = trim($_POST['ie']);
    $insert_produtor = "insert into produtor (idPessoa, cnpj, ie) values ('$idPessoa','$cnpj', '$ie')";
    $resprod = mysqli_query($con, $insert_produtor);
    echo " oi-p";
    unset ($_SESSION['btnProdutor']);
} else {
  echo " erroProd";
}

if (isset($_SESSION['btnCliente'])) {
  echo $_SESSION['btnCliente'];
    $cpf = trim($_POST['cpf']);
    $rg = trim($_POST['rg']);
    $insert_cliente = "insert into cliente (idPessoa, cpf, rg) values ('$idPessoa', '$cpf', '$rg')";
    $rescli = mysqli_query($con, $insert_cliente);
    echo " oi-c";
    unset ($_SESSION['btnCliente']);
} else {
  echo " erroCli";
}

if ($res) { ?>
    <div class="col-md-5 mx-auto m-5 p-5 alert alert-success" role="alert">
      <h4 class="alert-heading">Cadastrado com sucesso!</h4>
      <hr>
      <p class="mb-0">Clique <b><a href='?pagina=login'>aqui</a></b> para fazer login.</a></p>
    </div>
<?php } else { ?>
  <div class="col-md-11 mx-auto mt-3 py-4 alert alert-danger" role="alert">
    <h4 class="alert-heading">ERRO!</h4>
    <p>Ocorreu um erro no cadastro, por favor, contacte o administrador.</p>
    <hr>
    <p class="mb-0">Clique <b><a href='?pagina=cadastro'>aqui</a></b> para voltar.</a></p>
  </div>
<?php } ?>
