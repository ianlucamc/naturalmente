<?php
// echo "Dados do formulário:<br>";
// $email = $_REQUEST['email'];
// $senha = $_REQUEST['senha'];
// echo "Email: $email | Senha: $senha <br>";

$con = conecta();

$idpessoa = trim($_POST['idpessoa']);
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

$update = "UPDATE pessoa SET nome='$nome', email='$email', senha='$senha', bairro='$bairro', rua='$rua', numero='$numero', cep='$cep', complemento='$complemento', fone='$telefone', celular='$celular', idCidade='$cidade' WHERE idPessoa=$idpessoa";
$res = mysqli_query($con, $update);

// if (isset($_SESSION['btnProdutor'])) {
//   echo $_SESSION['btnProdutor'];
//     $cnpj = trim($_POST['cnpj']);
//     $ie = trim($_POST['ie']);
//     $insert_produtor = "insert into produtor (idPessoa, cnpj, ie) values ('$idPessoa','$cnpj', '$ie')";
//     $resprod = mysqli_query($con, $insert_produtor);
//     echo " oi-p";
//     unset ($_SESSION['btnProdutor']);
// } else {
//   echo " erroProd";
// }
//
// if (isset($_SESSION['btnCliente'])) {
//   echo $_SESSION['btnCliente'];
//     $cpf = trim($_POST['cpf']);
//     $rg = trim($_POST['rg']);
//     $insert_cliente = "insert into cliente (idPessoa, cpf, rg) values ('$idPessoa', '$cpf', '$rg')";
//     $rescli = mysqli_query($con, $insert_cliente);
//     echo " oi-c";
//     unset ($_SESSION['btnCliente']);
// } else {
//   echo " erroCli";
// }

if ($res) { ?>
    <div class="col-md-11 mx-auto mt-3 py-4 alert alert-secondary" role="alert">
      <h4 class="alert-heading">Alterado com sucesso!</h4>
      <hr>
      <p>O registro já foi alterado no banco de dados do sistema.</p>
      <p class="mb-0">Clique <b><a href='?pagina=hortas-adm'>aqui</a></b> para voltar.</a></p>
    </div>
<?php } else { ?>
  <div class="col-md-11 mx-auto mt-3 py-4 alert alert-danger" role="alert">
    <h4 class="alert-heading">ERRO!</h4>
    <p>A alteração deu erro, tente novamente.</p>
    <hr>
    <p class="mb-0">Clique <b><a href='?pagina=hortas-adm'>aqui</a></b> para voltar.</a></p>
  </div>
<?php } ?>
