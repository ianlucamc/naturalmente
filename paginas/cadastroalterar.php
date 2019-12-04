<?php
$idpessoa = trim($_GET['idpessoa']);
$con = conecta();
$selectalterar = "SELECT * FROM pessoa
INNER JOIN cidade ON pessoa.idCidade = cidade.idCidade
INNER JOIN estado ON cidade.idEstado = estado.idEstado
WHERE idpessoa='$idpessoa'";
$res = mysqli_query($con, $selectalterar);
$pessoa = mysqli_fetch_assoc($res);

$selectcliente = "SELECT * FROM cliente WHERE idPessoa = '$idpessoa'";
$resCliente = mysqli_query ($con, $selectcliente);
$cliente = mysqli_fetch_assoc($resCliente);

$selectprodutor = "SELECT * FROM produtor WHERE idPessoa = '$idpessoa'";
$resProdutor = mysqli_query ($con, $selectprodutor);
$produtor = mysqli_fetch_assoc($resProdutor);
?>

<div class="container mt-2 p-4">
      <div class="row">
        <div class="col-md-9 mx-auto">
          <h3>Alterar cadastro</h3>
          <hr>
          <form action="?pagina=cadastro-alterar" method="post" id="formulario">

            <div class="form-row">
              <div class="form-group col-md">
                <label>Nome completo:</label><br>
                <input type="text" name="nome" value="<?php echo $pessoa['nome'];?>" class="form-control" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Email:</label><br>
                <input type="email" name="email" value="<?php echo $pessoa['email'];?>" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <label>Senha:</label><br>
                <input type="password" name="senha" value="<?php echo $pessoa['senha'];?>" class="form-control" required>
              </div>
            </div>

            <div class="form-row" id="produtor">
               <div class="form-group col-md-6">
                 <label>CNPJ:</label><br>
                 <input type="text" id="cnpj" name="cnpj" value="<?php echo $produtor['cnpj'];?>" class="form-control" required disabled>
               </div>
               <div class="form-group col-md-6">
                 <label>IE:</label><br>
                 <input type="text" id="ie" name="ie" value="<?php echo $produtor['ie'];?>" class="form-control" required disabled>
               </div>
               <input type="hidden" id="botaoprod" name="botaoprod" value="produtor">
            </div>

            <div class="form-row" id="cliente">
               <div class="form-group col-md-6">
                 <label>CPF:</label><br>
                 <input type="text" id="cpf" name="cpf" value="<?php echo $cliente['cpf'];?>" class="form-control" required disabled>
               </div>
               <div class="form-group col-md-6">
                 <label>RG:</label><br>
                 <input type="text" id="rg" name="rg" value="<?php echo $cliente['rg'];?>" class="form-control" required disabled>
               </div>
               <input type="hidden" id="botaocli" name="botaocli" value="cliente">
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Estado:</label><br>
                <!-- <input type="text" name="estado" value="" class="form-control" required> -->
                <select id="estado" name="estado" class="form-control" required>
                  <option value="<?php echo $pessoa['idEstado'];?>"><?php echo utf8_encode($pessoa['estado']);?></option>
                  <?php
                  $resEstado = mysqli_query ($con, 'SELECT * FROM estado');
                  while ($rowEstado = mysqli_fetch_assoc($resEstado)):
                   ?>
                   <option value="<?php echo $rowEstado['idEstado'] ?>"> <?php echo utf8_encode($rowEstado['estado']); ?> </option>
                 <?php endwhile ?>
                </select>
              </div>

              <div id="cidadecom" class="form-group col-md-4">
                <label>Cidade:</label><br>
                <!-- <input type="text" name="cidade" value="" class="form-control" required> -->
                <select name="cidade" id="cidade" class="form-control" required>
                  <option value="<?php echo $pessoa['idCidade'];?>"><?php echo utf8_encode($pessoa['cidade']);?></option>
                </select>
              </div>

              <div class="form-group col-md-4">
                <label>CEP:</label><br>
                <input type="text" id="cep" name="cep" value="<?php echo $pessoa['cep'];?>" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Bairro:</label><br>
                <input type="text" name="bairro" value="<?php echo $pessoa['bairro'];?>" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label>Rua:</label><br>
                <input type="text" name="rua" value="<?php echo $pessoa['rua'];?>" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label>Número:</label><br>
                <input type="text" name="numero" value="<?php echo $pessoa['numero'];?>" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Complemento:</label><br>
                <input type="text" name="complemento" value="<?php echo $pessoa['complemento'];?>" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label>Telefone fixo:</label><br>
                <input type="text" id="telefone_fixo" name="telefone" value="<?php echo $pessoa['fone'];?>" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label>Celular:</label><br>
                <input type="text" id="celular" name="celular" value="<?php echo $pessoa['celular'];?>" class="form-control" required>
              </div>
            </div>

            <input id="idpessoa" name="idpessoa" value="<?php echo $pessoa['idPessoa'];?>" type="hidden">
            <a href="?pagina=hortas-adm"><button type="button" class="mt-3 btn btn-secondary float-right">Cancelar</button></a>
            <button type="submit" class="mt-3 mr-1 btn btn-primary float-right">ALTERAR</button>

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

      // SELECT DE CIDADE

      $(document).ready(function() {
        $('#estado').change(function (){
          if ($(this).val()) {
            $('#cidade').html('<option value="" id="carregando">Carregando...</option>');

            $('#cidadecom').show();
            $.getJSON('http://localhost/naturalmente/controle/lista-cidades.php', { estado: $(this).val(), ajax: 'true' }, function (j) {
              var options = '<option value="">Selecione</option>';
              for (var i = 0; i < j.length; i++){
                options += '<option value="' + j[i].idCidade + '">' + j[i].cidade + '</option>';
              }
              $('#cidade').html(options).show();
              $('.carregando').hide();

              $('#cidade').removeAttr('disabled').focus();
            });
          } else {
            $('#cidade').html('<option value="">Selecione um estado</option>');
            $('#cidade').attr('disabled', 'disabled');
          }
        });
      });

      // APARECER SÓ CAMPOS PREENCHIDOS cnpj ie cpf rg

    //   $(document).ready(function() {
    //     $('#cnpj').change(function(){
    //       if ($(this).val() == '') {
    //         $("#produtor").hide();
    //         $('#cpf').removeAttr('disabled').focus();
    //         $('#rg').removeAttr('disabled').focus();
    //       }
    //       else {
    //         $("#cliente").hide();
    //         $('#cnpj').removeAttr('disabled').focus();
    //         $('#ie').removeAttr('disabled').focus();
    //     }
    //   });
    // });

    </script>
