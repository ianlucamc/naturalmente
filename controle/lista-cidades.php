<?php
require_once('../libs/configs.php');
require_once('../libs/funcs.php');
$con = conecta();
$idEstado = $_REQUEST['estado'];
// echo $idEstado;
$result_cidade = "SELECT * FROM cidade WHERE idEstado=$idEstado ORDER BY cidade";
$resultado_cidade = mysqli_query($con, $result_cidade);

while ($rowCidade = mysqli_fetch_assoc($resultado_cidade)) {
		$cidade_post[] = array(
			'idCidade'	=> $rowCidade['idCidade'],
			'cidade' => utf8_encode($rowCidade['cidade']),
		);
	}

	echo(json_encode($cidade_post));
?>
