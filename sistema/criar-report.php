<?php 
include("conexao.php");
$categoria = $_POST['categoria_erro'];
$descricao= $_POST['descricao'];


	if(!criarReport($conexao,$categoria,$descricao)){
		header("location:../report.php?sucesso=1");
	}else{
		header("location:../report.php?sucesso=2");
	}
?>