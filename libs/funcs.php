<?php
function navega($pagina){
  switch ($pagina) {
    case 'hortas':
      require 'paginas/hortas.php';
      break;
    case 'hortas-adm':
      require 'paginas/hortas-adm.php';
      break;

    case 'cadastro':
      require 'paginas/cadastro.php';
      break;
    case 'cadastro-inserir':
      require 'controle/cadastro-inserir.php';
      break;
    case 'alterarhorta':
      require 'paginas/cadastroalterar.php';
      break;
    case 'cadastro-alterar':
      require 'controle/cadastro-alterar.php';
      break;
    case 'excluirhorta':
      require 'paginas/cadastroexcluir.php';
      break;
    case 'cadastro-excluir':
      require 'controle/cadastro-excluir.php';
      break;

    case 'login':
      require 'paginas/login.php';
      break;
    case 'login-entrar':
      require 'controle/login-entrar.php';
      break;
    case 'login-sair':
      require 'controle/login-sair.php';
      break;

    case 'produtos':
      require 'paginas/produtos.php';
      break;

    case 'venda':
      require 'paginas/venda.php';
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
