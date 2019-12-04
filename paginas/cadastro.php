<?php $con = conecta();
@session_start();
if(isset($_SESSION['btnProdutor'])){
  unset ($_SESSION['btnProdutor']);
}else{

}
if(isset($_SESSION['btnCliente'])){
  unset ($_SESSION['btnCliente']);
}else{

}
?>

<script>
$(document).ready(function(){
  $("#btnProdutor").click(function(){
    $("#perfil").hide();
    $("#cliente").hide();
    $('#cnpj').removeAttr('disabled').focus();
    $('#ie').removeAttr('disabled').focus();
    $("#formulario").fadeIn();
    $.ajax({
      url: "http://localhost/naturalmente/controle/session-produtor.php"
    });
  });

  $("#btnCliente").click(function() {
    $("#perfil").hide();
    $("#produtor").hide();
    $('#cpf').removeAttr('disabled').focus();
    $('#rg').removeAttr('disabled').focus();
    $("#formulario").fadeIn();
    $.ajax({
      url: "http://localhost/naturalmente/controle/session-cliente.php"
    });
  });

});
</script>

<div class="container">
      <div class="row">
        <div class="col-md-9 mx-auto py-5">
          <h3>Cadastro</h3>
          <hr>

          <form action="?pagina=cadastro-inserir" method="post">
            <div id="perfil">
              <div class="row justify-content-center pb-2">
                <h4>Como você gostaria de se cadastrar?</h4>
              </div>
              <div class="row justify-content-center">
                <button type="button" class="btn btn-dark mr-1" value="p" id="btnProdutor" name="btnProdutor">Produtor</button>
                <button type="button" class="btn btn-dark ml-1" value="c" id="btnCliente" name="btnCliente">Cliente</button>
              </div>
            </div>

            <div id=formulario style="display: none">
            <div class="form-row">
              <div class="form-group col-md">
                <label>Nome completo:</label><br>
                <input type="text" name="nome" value="" class="form-control" required>
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

            <div class="form-row" id="produtor">
               <div class="form-group col-md-6">
                 <label>CNPJ:</label><br>
                 <input type="text" id="cnpj" name="cnpj" value="" class="form-control" required disabled>
               </div>
               <div class="form-group col-md-6">
                 <label>IE:</label><br>
                 <input type="text" id="ie" name="ie" value="" class="form-control" required disabled>
               </div>
               <input type="hidden" id="botaoprod" name="botaoprod" value="produtor">
            </div>

            <div class="form-row" id="cliente">
               <div class="form-group col-md-6">
                 <label>CPF:</label><br>
                 <input type="text" id="cpf" name="cpf" value="" class="form-control" required disabled>
               </div>
               <div class="form-group col-md-6">
                 <label>RG:</label><br>
                 <input type="text" id="rg" name="rg" value="" class="form-control" required disabled>
               </div>
               <input type="hidden" id="botaocli" name="botaocli" value="cliente">
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Estado:</label><br>
                <!-- <input type="text" name="estado" value="" class="form-control" required> -->
                <select id="estado" name="estado" class="form-control" required>
                  <option value="">Selecione</option>
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
                <select name="cidade" id="cidade" class="form-control" required disabled>
                  <option value="" id="estadoprimeiro" class="estadoprimeiro">Selecione um estado</option>
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

            <button type="submit" class="mt-3 btn btn-success float-right">Cadastrar</button>

          </div>
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

      // SELECT DE CIDADE

      $(document).ready(function() {
        $('#estado').change(function (){
          if ($(this).val()) {
            $('#cidade').attr('disabled', 'disabled');
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

      </script>
