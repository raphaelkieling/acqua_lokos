<?php 
	include("conexao.php");
	$nome   = $_POST['nome_f'];
	$email  = $_POST['email_f'];
	$setor  = $_POST['setor_f'];
	$funcao = $_POST['funcao_f'];

	if(cadastrarFuncionario($conexao,$nome,$email,$setor,$funcao)){
		header("location:../funcionario.php?sucesso='1'");
	}else{
		header("location:../funcionario.php?sucesso='2'");
	}

?>