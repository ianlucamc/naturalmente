<?php
// echo "Dados do formulário:<br>";
// $email = $_REQUEST['email'];
// $senha = $_REQUEST['senha'];
// echo "Email: $email | Senha: $senha <br>";

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$con = conecta();
$select = "SELECT * FROM pessoa WHERE email=$email AND senha=$senha";
$res = mysqli_query($con, $select);

  if (mysql_num_rows ($res) > 0) {
    // $_SESSION['email'] = $email;
    // $_SESSION['senha'] = $senha;
    // header('location:site.php');
    ?>
      <div class="col-md-11 mx-auto mt-3 py-4 alert alert-info" role="alert">
        <h4 class="alert-heading">Logado com sucesso!</h4>
        <hr>
        <p>O login foi feito.</p>
        <p class="mb-0">Clique <b><a href='?pagina=login'>aqui</a></b> para voltar.</a></p>
      </div>
  <?php } else {
    // unset ($_SESSION['login']);
    // unset ($_SESSION['senha']);
    // header('location:index.php');
    ?>
    <div class="col-md-11 mx-auto mt-3 py-4 alert alert-danger" role="alert">
      <h4 class="alert-heading">ERRO!</h4>
      <p>Tente novamente.</p>
      <hr>
      <p class="mb-0">Clique <b><a href='?pagina=login'>aqui</a></b> para voltar.</a></p>
    </div>
  <?php } ?>
