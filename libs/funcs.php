<?php
function navega($pagina){
  switch ($pagina) {
    case 'hortas':
      require 'paginas/hortas.php';
      break;
    case 'cadastro':
      require 'paginas/cadastro.php';
      break;

    default:
      require 'paginas/home.php';
      break;
  }
}

function conecta(){
  return mysqli_connect(HOST, USER, PASS, BANCO);
}
 ?>
