<?php $con = conecta(); ?>

<div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto py-5">
          <h3>Cadastro</h3>
          <hr>
          <form action="?pagina=cadastro-inserir" method="post" id="formulario">

            <div class="form-row">
              <div class="form-group col-md">
                <label>Nome completo:</label><br>
                <input type="text" name="nome" value="" class="form-control" required>
                <!-- <span class="text-danger"></span> -->
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email:</label><br>
                <input type="email" name="email" value="" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label>Senha:</label><br>
                <input type="password" name="senha" value="" class="form-control" required>
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
                <!-- <input type="text" name="estado" value="" class="form-control" required> -->
                <select name="estado" class="form-control" required>
                  <option value="">Selecione</option>
                  <?php
                  $resEstado = mysqli_query ($con, 'SELECT * FROM estado');
                  while ($rowEstado = mysqli_fetch_assoc($resEstado)):
                   ?>
                   <option value="<?php echo $rowEstado['idestado'] ?>"> <?php echo utf8_encode($rowEstado['nome']); ?> </option>
                 <?php endwhile ?>
                </select>
              </div>

              <!-- CIDADES CONFORME O ESTADO SELECIONADO -->
              <div id="cidade" class="form-group col-md-4">
                <label>Cidade:</label><br>
                <!-- <input type="text" name="cidade" value="" class="form-control" required> -->
                <select name="cidade" class="form-control" required>
                  <option value="">Selecione um estado primeiro</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label>CEP:</label><br>
                <input type="text" id="cep" name="cep" value="" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Bairro:</label><br>
                <input type="text" name="bairro" value="" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label>Rua:</label><br>
                <input type="text" name="rua" value="" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label>Número:</label><br>
                <input type="text" name="numero" value="" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Complemento:</label><br>
                <input type="text" name="complemento" value="" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label>Telefone fixo:</label><br>
                <input type="text" id="telefone_fixo" name="telefone" value="" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label>Celular:</label><br>
                <input type="text" id="celular" name="celular" value="" class="form-control" required>
              </div>
            </div>

            <!-- <div class="form-row">
               <div class="form-group col-md">
                 <hr>
               </div>
            </div> -->

            <button type="submit" class="mt-3 btn btn-success">Cadastrar</button>
            <button type="reset" class="mt-3 btn btn-danger">Limpar</button>
            <!-- Cancelar -->

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
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#cnpj').mask('00.000.000/0000-00');
        $('#money').mask('000.000.000.000.000,00', {reverse: true});
      });
    </script>

<!-- SELECT DE CIDADE -->

<!--
$cids = mysqli_query($con, "SELECT cidade FROM pessoa");
<br>
<select class="form-control" name="cidade">
  <?php //while ($cidades = mysqli_fetch_assoc($cids)): ?>
  <option value=""><?php //echo $cidades['cidade'];?></option>
  <?php //endwhile ?>
</select>
<br> -->
