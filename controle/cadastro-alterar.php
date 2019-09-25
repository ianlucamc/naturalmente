<?php
// echo "Dados do formulário:<br>";
// $email = $_REQUEST['email'];
// $senha = $_REQUEST['senha'];
// echo "Email: $email | Senha: $senha <br>";

$idpessoa = trim($_POST['idpessoa']);
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$cidade = trim($_POST['cidade']);
$bairro = trim($_POST['bairro']);
$rua = trim($_POST['rua']);
$numero = trim($_POST['numero']);
$cep = trim($_POST['cep']);
$telefone = trim($_POST['telefone']);

$con = conecta();
$update = "update pessoa set nome='$nome', email='$email', senha='$senha', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', cep='$cep', fone='$telefone' where idpessoa=$idpessoa";
$res = mysqli_query($con, $update);

if ($res) { ?>
    <div class="col-md-11 mx-auto mt-3 py-4 alert alert-info" role="alert">
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
