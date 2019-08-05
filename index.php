<?php

$get = isset($_GET['pagina'])? $_GET['pagina']:'';
//require 'libs/funcs.php';
require 'template/header.php';
require 'template/menu.php';

// Conteúdo dinâmico de acordo com o menu
require 'paginas/home.php';
//require 'paginas/cadastro.php';
//navega($get);

require 'template/footer.php';
?>
