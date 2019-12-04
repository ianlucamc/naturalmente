<?php
$con = conecta();

$idpessoa = trim($_POST['idpessoa']);

$delete = "DELETE FROM pessoa WHERE idPessoa=$idpessoa";
$res = mysqli_query($con, $delete);

if ($res) { ?>
    <div class="col-md-11 mx-auto mt-3 py-4 alert alert-secondary" role="alert">
      <h4 class="alert-heading">Excluído com sucesso!</h4>
      <hr>
      <p>O registro já foi excluído do banco de dados do sistema.</p>
      <p class="mb-0">Clique <b><a href='?pagina=hortas-adm'>aqui</a></b> para voltar.</a></p>
    </div>
<?php } else {?>
  <div class="col-md-11 mx-auto mt-3 py-4 alert alert-danger" role="alert">
    <h4 class="alert-heading">ERRO!</h4>
    <p>Não foi possível excluir, tente novamente.</p>
    <hr>
    <p class="mb-0">Clique <b><a href='?pagina=hortas-adm'>aqui</a></b> para voltar.</a></p>
  </div>
<?php } ?>
