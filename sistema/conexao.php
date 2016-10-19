
<?php 
	date_default_timezone_set('America/Sao_Paulo');
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
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
		if(mysqli_query($conexao,"insert into funcionario(nome,email,setor,funcao) value('$nome','$email','$setor','$funcao')")){
				return true;
		}else{
				return false;
		}
	}
	function deletarFuncionario($conexao,$id){
		if(mysqli_query($conexao,"delete from funcionario where id=$id")){
					mysqli_query($conexao,"delete from usuario where id=$id");
					return true;
				}else{
						return false;
				}
	}

//Usuarios
	function mostrarUsuario($conexao){
		return mysqli_query($conexao,"select usuario.id,funcionario.id,nome,senha,acesso from usuario join funcionario on usuario.id = funcionario.id ");
	}
	function mostrarUsuarioE($conexao,$id)
	{
		return mysqli_query($conexao,"select usuario.id,funcionario.id,nome from usuario join funcionario on usuario.id = funcionario.id where funcionario.id =$id");
	}
	function cadastrarUsuario($conexao,$id,$senha,$acesso){
		if(mysqli_query($conexao,"insert into usuario(id,senha,acesso) values('$id','$senha','$acesso')")){
				return true;
		}else{
				return false;
		}
	}
	function deletarUsuario($conexao,$id){
		if(mysqli_query($conexao,"delete from usuario where id=$id")){
					return true;
		}else{
						return false;
		}	
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
		if(mysqli_query($conexao,"DELETE FROM chamado WHERE id=$id")){
			return true;
		}else{
				return false;
		}
	}    
 	function sucessoChamado($conexao,$id){
        try{
            //Ele vai inserir todo conteudo que ele selecionar dentro do chamado e colocará dentro do chamado_concluido.
            mysqli_query($conexao,"insert into chamado_concluido(id,problema,problema_opcao,nome,criador,n0,n1,n2,prazo,data,datainicial,hora,situacao,status,descricao) select id,problema,problema_opcao,nome,criador,n0,n1,n2,prazo,data,datainicial,hora,situacao,status,descricao from chamado where id=$id");
            //E por fim vai deletar se der algo errado e retornará verdadeiro (true)
            mysqli_query($conexao,"DELETE FROM chamado WHERE id=$id");
            return true;
        }catch(Exception $e){
            //caso de algum erro retornará falso.
            return false;
        }
        
             
    }
	function mostrarModificar($conexao,$id){
		return mysqli_query($conexao,"select * from chamado where id=$id");
	}
	function modificarChamado($conexao,$id,$problema,$problema_opcao,$nome,$criador,$n0,$n1,$n2,$prazo,$data,$data_i,$hora,$status,$descricao){	
		try {
			mysqli_query($conexao,"update chamado set problema='$problema',problema_opcao='$problema_opcao',nome='$nome',criador='$criador',n0='$n0',n1='$n1',n2='$n2',prazo=$prazo,data='$data',datainicial='$data_i',hora='$hora',status='$status',descricao='$descricao' where id=$id");
			echo "deu";
		} catch (Exception $e) {
			echo 'Mensagem do erro, e procedimentos a executar caso haja o erro: ', $e->getMessage(), "\n";
		}
	}
	function situacaoChamado($conexao,$id){
		if(mysqli_query($conexao,"update chamado set situacao='Atrasado' where id=$id")){
			return true;
		}
	}
	function situacaoChamadoAndamento($conexao,$id){
		if(mysqli_query($conexao,"update chamado set situacao='Em Prazo' where id=$id")){
			return true;
		}
	}
//Inventário
	function criarInventario($conexao,$nome,$usuario,$sistema,$office,$teamv,$auto,$queops,$hd,$processador,$memoria,$setor,$tipo,$fabricante,$ano,$ip){
		mysqli_query($conexao,"INSERT INTO inventario(nome_c,usuario_c,sistema,office,teamv,automatize,queops,hd,processador,memoria,setor_i,tipo,fabricante,ano,ip) VALUES('$nome','$usuario','$sistema','$office','$teamv','$auto','$queops','$hd','$processador','$memoria','$setor','$tipo','$fabricante','$ano','$ip')");
		return 1;
	}
	function mostrarInventario($conexao){
		return mysqli_query($conexao,"SELECT inventario.id,funcionario.id,hd,memoria,processador,fabricante,ano,ip,tipo,nome,nome_c,usuario_c,sistema,office,teamv,automatize,queops,setor_i FROM inventario JOIN funcionario ON usuario_c = funcionario.id order by setor_i asc");
	}
	function deletarInventario($conexao,$id){
		if(mysqli_query($conexao,"DELETE FROM inventario WHERE id=$id")){
			return true;
		}else{
			return false;
		}
	}
//REPORT
	function criarReport($conexao,$categoria,$descricao){
		mysqli_query($conexao,"insert into erros(categoria,descricao) values('$categoria','$descricao')");
	}
	function verificaReport($conexao){
		$select = mysqli_query($conexao,"select * from erros");
		$erros = 0;
		while($erro = mysqli_fetch_assoc($select)){
			$erros +=1;
		}
		if($erros<=0){
			return true;
		}else{
			return $erros;
		}
	}
	//TELEFONIA
	
			function criaTelefone($conexao,$funcionario,$telefone){
					if(mysqli_query($conexao,"insert into telefonia(funcionario,telefone) values('$funcionario','$telefone')")){
							return true;
					}else{
							return false;
					}
			}
			function mostrarTelefone($conexao){
					return mysqli_query($conexao,"select telefonia.id as idt,funcionario.id,nome,telefone from telefonia join funcionario on funcionario.id = telefonia.funcionario order by nome asc");
			}
		function deletarTelefone($conexao,$id){
				if(mysqli_query($conexao,"DELETE FROM telefonia WHERE id=$id")){
					return true;
				}else{
						return false;
				}
		}
?>