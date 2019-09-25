<?php
$con = conecta();
$res = mysqli_query ($con, 'SELECT * FROM pessoa');
?>

<div class="container mt-2 p-4">
        <div class="row">
            <div class="col-md">

                <h3>Produtores disponíveis</h3>
                <hr>

                <table class="table table-striped table-hover" id="tabela">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Cidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php while ($pessoa = mysqli_fetch_assoc($res)): ?>
                    <tbody>

                        <tr>
                          <td> <?php echo $pessoa['nome']; ?></td>
                          <td><?php echo $pessoa['email']; ?></td>
                          <td><?php echo $pessoa['cidade']; ?></td>
                          <td><a href="?pagina=alterarhorta&idpessoa=<?php echo $pessoa['idPessoa'];?>" class="text-primary">ALTERAR </a></td>
                          <td><a href="?pagina=excluirhorta&idpessoa=<?php echo $pessoa['idPessoa'];?>" class="text-danger">EXCLUIR</a></td>
                        </tr>

                    </tbody>
                    <?php endwhile ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#tabela").DataTable({
              responsive: true,
              // "bSort": false,
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
                  "search": "Procurar:",
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
