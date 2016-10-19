<?php 
	include("conexao.php");
	$id = $_GET['id'];
	if(deletarTelefone($conexao,$id)){
		header("location:../telefonia.php?sucesso=1");
	}else{
		header("location:../telefonia.php?sucesso=2");
	}
?>