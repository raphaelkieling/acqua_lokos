<?php 
	include('sistema/logar.php');
	session_start();
	if(isset($_SESSION['id'])){
		$id_u = $_SESSION['id'];?>
<head>
	<!-- Estilo da pagina -->
	<?php include("estilo.php") ?>
<!-- Caso exista um usuario ele faz tudo se nao, ele sai -->
</head>
<body>
		<!--  Barra de administração onde fica o nome de bem vindo-->
		<center> <?php include("header.php");?> </center>
            <?php include("menu.php") ?>
		<div class="container section-home">
			<h2>Reportar Erro</h2>
			<table>
				<tr>
					<th>Onde ocorreu o problema?</th>
				</tr>
				<tr>
					<td>
						<select name="" id="">
							<option value="Paginal Principal">Pagina Principal</option>
							<option value="">----FUNCIONARIO----</option>
							<option value="Funcionario">Pagina Funcionario</option>
							<option value="Criar Funcionario">Ao criar funcionario</option>
							<option value="Deletar Funcionario">Ao deletar funcionario</option>
							<option value="Mostra Funcionario">Mostra informaçoes erradas</option>
							<option value="">----USUARIO----</option>
							<option value="Usuario">Pagina Usuario</option>
							<option value="Criar Usuario">Criar Usuario</option>
							<option value="Deletar Usuario">Deletar Usuario</option>
							<option value="Mostra Usuario">Mostra informaçoes erradas</option>
							<option value="Acesso">Acesso errado a conta</option>
							<option value="">----CHAMADOS----</option>
							<option value="Pagina Chamados">Pagina Chamados</option>
							<option value="Ao criar Chamado">Ao criar Chamado</option>
							<option value="Ao puxar Criador">Ao puxar Criador</option>
							<option value="Ao puxar Funcionario">Ao puxar Funcionario</option>
							<option value="NAO cadastra">Não consegue cadastrar</option>
							<option value="Coisas erradas">Cadastra coisas erradas</option>
							<option value="Data ou hora">Data/Hora erradas</option>
							<option value="">----OUTRO----</option>
							<option value="OProblema">Outro problema</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Descrição do problema:</th>
				</tr>
				<tr>
					<td><textarea name="" id="" cols="30" rows="10"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit"></td>
				</tr>
			</table>
			
		</div>	
</body>

<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>

