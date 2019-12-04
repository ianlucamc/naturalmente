<?php

$get = isset($_GET['pagina'])? $_GET['pagina']:'';
require 'libs/configs.php';
require 'libs/funcs.php';
require 'template/header.php';
require 'template/menu.php';

// Conteúdo dinâmico de acordo com o menu
navega($get);

require 'template/footer.php';
?>
