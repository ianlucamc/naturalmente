<?php
$idpessoa = trim($_GET['idpessoa']);
$con = conecta();
$res = mysqli_query($con, "SELECT * FROM pessoa WHERE idpessoa=$idpessoa");
$pessoa = mysqli_fetch_assoc($res);
?>

<div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto py-5">
          <h3>Cadastro</h3>
          <hr>
          <form action="?pagina=cadastro-alterar" method="post" id="formulario">

            <div class="form-row">
              <div class="form-group col-md">
                <label>Nome completo:</label><br>
                <input type="text" name="nome" value="<?php echo $pessoa['nome'];?>" class="form-control obrigatorio" required>
                <!-- <span class="text-danger"></span> -->
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email:</label><br>
                <input type="text" name="email" value="<?php echo $pessoa['email'];?>" class="form-control obrigatorio" required>
              </div>
              <div class="form-group col-md-6">
                <label>Senha:</label><br>
                <input type="password" name="senha" value="<?php echo $pessoa['senha'];?>" class="form-control obrigatorio" required>
              </div>
            </div>

            <!-- <div class="form-row">
               <div class="form-group col-md">
                 <hr>
               </div>
            </div> -->

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Estado:</label><br>
                <input type="text" name="estado" value="" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label>Cidade:</label><br>
                <input type="text" name="cidade" value="<?php echo $pessoa['cidade'];?>" class="form-control obrigatorio" required>
              </div>
              <div class="form-group col-md-4">
                <label>CEP:</label><br>
                <input type="text" id="cep" name="cep" value="<?php echo $pessoa['cep'];?>" class="form-control obrigatorio" required>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Bairro:</label><br>
                <input type="text" name="bairro" value="<?php echo $pessoa['bairro'];?>" class="form-control obrigatorio" required>

              </div>
              <div class="form-group col-md-4">
                <label>Rua:</label><br>
                <input type="text" name="rua" value="<?php echo $pessoa['rua'];?>" class="form-control obrigatorio" required>

              </div>
              <div class="form-group col-md-4">
                <label>Número:</label><br>
                <input type="text" name="numero" value="<?php echo $pessoa['numero'];?>" class="form-control obrigatorio" required>

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Complemento:</label><br>
                <input type="text" name="complemento" value="" class="form-control">

              </div>
              <div class="form-group col-md-6">
                <label>Telefone fixo:</label><br>
                <input type="text" id="telefone_fixo" name="telefone" value="<?php echo $pessoa['fone'];?>" class="form-control obrigatorio" required>

              </div>
              <!-- CELULAR -->
            </div>

            <!-- <div class="form-row">
               <div class="form-group col-md">
                 <hr>
               </div>
            </div> -->

            <input id="idpessoa" name="idpessoa" value="<?php echo $pessoa['idPessoa'];?>" type="hidden">
            <button type="submit" class="mt-3 btn btn-info">ALTERAR</button>
            <a href="?pagina=hortas-adm"><button type="button" class="mt-3 btn btn-danger">Cancelar</button></a>

          </form>
        </div>
      </div>
    </div>

    <!-- MÁSCARAS JS -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#date').mask('00/00/0000');
        $('#time').mask('00:00:00');
        $('#date_time').mask('00/00/0000 00:00:00');
        $('#cep').mask('00000-000');
        $('#celular').mask('(00) 00000-0000');
        $('#telefone_fixo').mask('(00) 0000-0000');
        $('#phone_us').mask('(000) 000-0000');
        $('#mixed').mask('AAA 000-S0S');
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
      });
    </script>
