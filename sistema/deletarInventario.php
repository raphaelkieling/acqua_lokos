<?php 
	include("conexao.php");
	$id = $_GET['id'];
	if(deletarInventario($conexao,$id)){
		header("location:../inventario.php?sucesso=1");
	}else{
		header("location:../inventario.php?sucesso=2");
	}
?>