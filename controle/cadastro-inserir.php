<?php
// echo "Dados do formulário:<br>";
// $email = $_REQUEST['email'];
// $senha = $_REQUEST['senha'];
// echo "Email: $email | Senha: $senha <br>";

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);
$cidade = trim($_POST['cidade']);
$cep = trim($_POST['cep']);
$bairro = trim($_POST['bairro']);
$rua = trim($_POST['rua']);
$numero = trim($_POST['numero']);
$complemento = trim($_POST['complemento']);
$telefone = trim($_POST['telefone']);
$celular = trim($_POST['celular']);

$con = conecta();
$insert = "insert into pessoa (nome, email, senha, cep, cidade, bairro, rua, numero, complemento, fone, celular) values ('$nome', '$email', '$senha', '$cep', '$idCidade', '$bairro', '$rua', '$numero', '$complemento', '$telefone', '$celular')";
$res = mysqli_query($con, $insert);

if ($res) { ?>
    <div class="col-md-11 mx-auto mt-3 py-4 alert alert-success" role="alert">
      <h4 class="alert-heading">Cadastrado com sucesso!</h4>
      <!-- <p>Awww yeah, agora você já faz parte da família Naturalmente e pode colaborar conosco em nossa missão.</p> -->
      <hr>
      <!-- href para LOGIN -->
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
