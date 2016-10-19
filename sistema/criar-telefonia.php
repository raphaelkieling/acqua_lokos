<?php 
include("conexao.php");
$funcionario = $_GET['funcionario'];
$telefone= $_GET['telefone'];

	if(criaTelefone($conexao,$funcionario,$telefone)){
		header("location:../telefonia.php?sucesso=1");
	}else{
		header("location:../telefonia.php?sucesso=2");
	}
?>