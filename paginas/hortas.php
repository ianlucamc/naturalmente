//https://datatables.net/

<?php
$con = conecta();
$res = mysqli_query ($con, 'SELECT * FROM tabela_bd');
 ?>

 <?php while ($variavel = mysqli_fetch_assoc($res)): ?>

<?php endwhile ?>
