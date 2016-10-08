<?php 
	include("conexao.php");
	$id = $_GET['id'];
	if(deletarChamado($conexao,$id)){
		header("location:../chamados.php?sucesso=1");
	}else{
		header("location:../chamados.php?sucesso=2");
	}
?>