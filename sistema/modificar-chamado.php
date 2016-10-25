<?php 
	include("conexao.php");
	$id			    = $_POST['id_mod'];
	$problema_c     = $_POST['problema_c'];
	$problema_opcao = $_POST['tipoProblema'];
	$usuario_c      = $_POST['usuario_c'];
	$funcionario_c  = $_POST['funcionario_c'];
	$data_c         = $_POST['data_c'];
	$data_c_i       = $_POST['data_c'];
	$hora_c         = $_POST['hora_c'];
	$prazo_c        = "0";
	$n0_c           = $_POST['n0_c'];
	$n1_c           = $_POST['n1_c'];
	$n2_c           = $_POST['n2_c'];
	$descricao_c    = $_POST['descricao_c'];
	$status_c       = $_POST['status'];;

	if($status_c == "Concluido"){
		header("location:sucesso-chamado.php?id=$id");
	}else{	if(modificarChamado($conexao,$id,$problema_c,$problema_opcao,$usuario_c,$funcionario_c,$n0_c,$n1_c,$n2_c,$prazo_c,$data_c,$data_c_i,$hora_c,$status_c,$descricao_c)){
		header("location:../chamados.php?sucesso=1");
		}else{
			header("location:../chamados.php?sucesso=2");
		}
	}
?>
