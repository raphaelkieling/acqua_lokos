<?php 
	include("conexao.php");
	$id = $_GET['id'];
	if(deletarFuncionario($conexao,$id)){
		header("location:../funcionario.php?sucesso=1");
	}else{
		header("location:../funcionario.php?sucesso=2");
	}
?>