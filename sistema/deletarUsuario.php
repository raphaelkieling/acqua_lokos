<?php 
	include("conexao.php");
	$id = $_GET['id'];
	if(deletarUsuario($conexao,$id)){
		header("location:../usuario.php?sucesso=1");
	}else{
		header("location:../usuario.php?sucesso=2");
	}
?>