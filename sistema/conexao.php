
<?php 
	error_reporting(E_ALL);
	// ARQUIVO BASE PARA O FUNCIONAMENTO, CENTRALIZEI TODAS AS FUNÇOES PARA CRIAÇAO DE FUNCIONARIOS E RESPECTIVAS TROCAS COMO DELETAR E MOSTRA-LOS.
	//2016
	//Raphael Kieling
	//Sistema acqua lokos
	//Nao foram usados metodos avançados, tenho como objetivo recriar o mesmo sistema em Cake PHP e tranforma-lo em um sistema MVC
	$conexao = mysqli_connect("localhost","root","","acqualokos");

//Loga no sistema, buscando uma linha que tenha exatamente o mesmo id e extamente o mesmo usuario
	function logar($conexao,$id,$senha){
			$select = mysqli_query($conexao,"select id,senha from usuario where id=$id and senha='$senha'");
		if(mysqli_fetch_row($select)>0){
			session_start();
			$_SESSION['id'] = $id;
			header("location:../home.php");
		}else{
			session_start();
			unset($_SESSION['id']);
			header("location:../index.php");
		}
	}
//Funcionarios
	function mostrarFuncionario($conexao){
		return mysqli_query($conexao,"select * from funcionario");
	}

	function cadastrarFuncionario($conexao,$nome,$email,$setor,$funcao){
		mysqli_query($conexao,"insert into funcionario(nome,email,setor,funcao) value('$nome','$email','$setor','$funcao')");
	}

	function deletarFuncionario($conexao,$id){
		mysqli_query($conexao,"delete from funcionario where id=$id");
		mysqli_query($conexao,"delete from usuario where id=$id");
	}
//Usuarios
	function mostrarUsuario($conexao)
	{
		return mysqli_query($conexao,"select usuario.id,funcionario.id,nome,senha,acesso from usuario join funcionario on usuario.id = funcionario.id ");
	}
	function mostrarUsuarioE($conexao,$id)
	{
		return mysqli_query($conexao,"select usuario.id,funcionario.id,nome from usuario join funcionario on usuario.id = funcionario.id where funcionario.id =$id");
	}

	function cadastrarUsuario($conexao,$id,$senha,$acesso){
		mysqli_query($conexao,"insert into usuario(id,senha,acesso) values('$id','$senha','$acesso')");
	}

	function deletarUsuario($conexao,$id){
		mysqli_query($conexao,"delete from usuario where id=$id");
	}
//Acesso
	function Acesso($conexao,$id){
		$acesso_numero = 0;
		$select = mysqli_query($conexao,"select acesso from usuario where id=$id");
		while($acesso = mysqli_fetch_assoc($select)){
			$acesso_numero = $acesso['acesso'];
		}
		$acesso_numero = intval($acesso_numero);
		return $acesso_numero;
	}
//Chamado
	function criarChamado($conexao,$problema,$problema_opcao,$nome,$criador,$n0,$n1,$n2,$prazo,$data,$data_i,$hora,$status,$descricao){
		mysqli_query($conexao,"insert into chamado(problema,problema_opcao,nome,criador,n0,n1,n2,prazo,data,datainicial,hora,status,descricao) values('$problema','$problema_opcao','$nome','$criador','$n0','$n1','$n2','$prazo','$data','$data_i','$hora','$status','$descricao')");
	}
	function deletarChamado($conexao,$id){
		return mysqli_query($conexao,"DELETE FROM chamado WHERE id=$id");
	}
//Inventário
	function criarInventario($conexao,$nome,$usuario,$sistema,$office,$teamv,$auto,$queops,$setor){
		mysqli_query($conexao,"INSERT INTO inventario(nome_c,usuario_c,sistema,office,teamv,automatize,queops,setor_i) VALUES('$nome','$usuario','$sistema','$office','$teamv','$auto','$queops','$setor')");
		return 1;
	}
	function mostrarInventario($conexao){
		return mysqli_query($conexao,"SELECT inventario.id,funcionario.id,nome,nome_c,usuario_c,sistema,office,teamv,automatize,queops,setor_i FROM inventario JOIN funcionario ON usuario_c = funcionario.id order by setor_i asc");
	}
	function deletarInventario($conexao,$id){
		return mysqli_query($conexao,"DELETE FROM inventario WHERE id=$id");
	}
	?>