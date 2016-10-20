<?php 
	include("conexao.php");
	$id = $_GET['id'];
	deletarChamado($conexao,$id);

?>