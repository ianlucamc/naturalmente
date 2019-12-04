<?php
$con = conecta();
$res = mysqli_query ($con, 'SELECT * FROM produtor INNER JOIN pessoa ON produtor.idPessoa = pessoa.idPessoa INNER JOIN cidade ON pessoa.idCidade = cidade.idCidade');
?>

<div class="container">
    <div class="row">
        <div class="col-md-9 mx-auto py-5">
            <h3>Produtores disponíveis</h3>
            <hr>

            <table class="table table-striped table-hover" id="tabela">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cidade</th>
                    <!-- <th>Produtos</th> -->
                  </tr>
                </thead>
                <?php while ($pessoa = mysqli_fetch_assoc($res)): ?>
                <tbody>
                  <tr>
                    <td><?php echo utf8_encode ($pessoa['nome']); ?></td>
                    <td><?php echo utf8_encode ($pessoa['email']); ?></td>
                    <td><?php echo utf8_encode ($pessoa['cidade']); ?></td>
                    <!-- <td><a href="?pagina=?>" class="text-success">VER PRODUTOS </a></td> -->
                  </tr>
                </tbody>
                <?php endwhile ?>
            </table>

            <div class="row justify-content-center pt-2">
              <br><a href="?pagina=cadastro"> <button type="button" class="btn btn-dark mr-1">CADASTRE-SE AQUI</button></a><br>
              <a href="?pagina=login"> <button type="button" class="btn btn-dark">LOGIN</button></a>
            </div>

        </div>
      </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#tabela").DataTable({
              "responsive": true,
              "bSort": true,
              "aaSorting": [],
              "pageLength": 50,
              "language": {
                  "decimal": "",
                  "emptyTable": "Sem dados disponíveis",
                  "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                  "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
                  "infoFiltered": "(filtrado de _MAX_ registos no total)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ registos",
                  "loadingRecords": "A carregar dados...",
                  "processing": "A processar...",
                  "search": "Procure sua cidade:",
                  "zeroRecords": "Não foram encontrados resultados",
                  "paginate": {
                      "first": "Primeiro",
                      "last": "Último",
                      "next": "Seguinte",
                      "previous": "Anterior"
                  },
                  "aria": {
                      "sortAscending": ": ordem crescente",
                      "sortDescending": ": ordem decrescente"
                  }
                }
              });
        });
    </script>
