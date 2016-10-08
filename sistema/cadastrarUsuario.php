<?php  
	include("conexao.php");
	$id     = $_POST['id_u'];
	$senha  = $_POST['senha_u'];
	$acesso = $_POST['acesso_u'];

	if(cadastrarUsuario($conexao,$id,$senha,$acesso)){
		header("location:../usuario.php?sucesso=1");
	}else{
		header("location:../usuario.php?sucesso=2");
	}
?>