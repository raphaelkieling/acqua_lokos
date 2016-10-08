<?php 
	include('sistema/logar.php');
	session_start();
	if(isset($_SESSION['id'])=="true"){
		$id_u = $_SESSION['id'];?>


	<!-- Comeco do site -->
	<head>
	<?php include("estilo.php") ?>
	</head>
	<body>
		<!--  Barra de administração onde fica o nome de bem vindo-->
		<center> <?php include("header.php");?> </center>
		<?php include("menu.php") ?>
		
		<div class="container section-home">
			<?php 
				if(isset($_GET['sucesso'])=="1"){
					echo "<div class='yes'>Sucesso</div>";
				}else if(isset($_GET['cadastrado'])=="2"){
					echo "<div class='no'>Ocorreu um erro</div>";
				}
			 ?>

			<h2>Cadastrar Usuário</h2>
			<form action="sistema/cadastrarUsuario.php" method="post">
			<table>
				<tr>
					<td>Id Funcionário:</td>
					<td>
						<select name="id_u" id="">
						<?php 
						$select = mostrarFuncionario($conexao);
						while($funcionario = mysqli_fetch_assoc($select)){
							echo"<option value=".$funcionario['id'].">".$funcionario['nome']."</option>";
						}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Senha:</td>
					<td><input type="text" name="senha_u"></td>
				</tr>
				<tr>
					<td>Acesso</td>
					<td>
						<select name="acesso_u" id="">
							<option value="0">Nenhum</option>
							<option value="1">Consultar Chamados</option>
							<option value="2">Criar Chamados</option>
							<option value="3">Administrar usuarios/funcionarios</option>
							<option value="4">Acesso total</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Cadastrar"></td>
				</tr>
				</form>
			</table>
			<!-- Ja cadastrados -->
			<h2>Cadastrados</h2>
			<table class="bordb">
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Senha</th>
					<th>Acesso</th>
					<th>Deletar</th>
				</tr>
				<?php 
					$select = mostrarUsuario($conexao);
					while($usuario = mysqli_fetch_assoc($select)){ ?>
				<tr>
					<td><?= $usuario['id'] ?></td>
					<td><?= $usuario['nome'] ?></td>
					<td><?= $usuario['senha'] ?></td>
					<td><?= $usuario['acesso'] ?></td>
					<td><a href=<?php echo 'sistema/deletarUsuario.php?id='.$usuario['id']; ?>><img src="img/delete_2.png" alt=""></a></td>
				</tr>

				<?php } ?>
			</table>
		</div>

<?php	
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>
