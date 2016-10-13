<?php  
	include("conexao.php");
	$id     = $_GET['id'];

	if(sucessoChamado($conexao,$id) == true){
		header("location:../chamados.php?sucesso=1");
	}else{
		header("location:../chamados.php?sucesso=2");
         
	}
?>