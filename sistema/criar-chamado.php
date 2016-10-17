<?php 
	include("conexao.php");
	$problema_c    = $_POST['problema_c'];
	$problema_opcao= $_POST['tipoProblema'];
	$usuario_c     = $_POST['usuario_c'];
	$funcionario_c = $_POST['funcionario_c'];
	//$data_c        = $_POST['data_c'];
	$data_c        = date('d/m/Y');
	$data_c_i      = date('d/m/Y');
	$hora_c        = $_POST['hora_c'];
	$prazo_c       = "1";
	$n0            = $_POST['n0_c'];
	$n1            = $_POST['n1_c'];
	$n2            = $_POST['n2_c'];
	$descricao_c   = $_POST['descricao_c'];
	$status_c      = "Enviado";
	

	if($prazo_c <=0){
		$prazo_c = "0";
	}else{
		if($problema_opcao == "Dúvida"){
			$prazo_c = "1";
		}else{
			$prazo_c = "2";
		}
	}
	$data_c = DateTime::createFromFormat('d/m/Y', $data_c);
	$data_c->add(new DateInterval('P'.$prazo_c.'D')); // 2 dias
	$data_c =  $data_c->format('d/m/Y');


	if(!criarChamado($conexao,$problema_c,$problema_opcao,$usuario_c,$funcionario_c,$n0,$n1,$n2,$prazo_c,$data_c,$data_c_i,$hora_c,$status_c,$descricao_c)){
		header("location:../criar-chamado.php?sucesso=1");
	}else{
		$erro = mysqli_error($conexao);
		echo "ocorreu que:" .$erro;
	}

?>