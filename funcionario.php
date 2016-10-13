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
			<h2>Cadastrar Funcionário</h2>
			<form action="sistema/cadastrarFuncionario.php" method="post">
			<table>
					<tr>
						<td>Nome</td>
						<td><input type="text" name="nome_f" required></td>
					</tr>
					<tr>
						<td>E-mail</th>
						<td><input type="email" name="email_f"></td>
					</tr>
					<tr>
						<td>Setor</td>
						<td>
							<select name="setor_f" id="" required>
								<option value="tecnologia">tecnologia</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Função</td>
						<td>
							<select name="funcao_f" id="" required>
								<option value="Auxiliar">Auxiliar</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Cadastrar"></td>
					</tr>
				</table>
			</form>
			<!-- Ja cadastrados -->
			<h2>Cadastrados</h2>
			<table class="bordb">
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Setor</th>
					<th>Função</th>
					<th>Deletar</th>
				</tr>
				<?php 
					$select = mostrarFuncionario($conexao);
					while($funcionario = mysqli_fetch_assoc($select)){ ?>
						<tr>
							<td><?php echo $funcionario['id'] ?></td>
							<td><?php echo $funcionario['nome'] ?></td>
							<td><?php echo $funcionario['email'] ?></td>
							<td><?php echo $funcionario['setor'] ?></td>
							<td><?php echo $funcionario['funcao'] ?></td>
							<td>
									<a href=<?php echo "sistema/deletarFuncionario.php?id=".$funcionario['id']; ?>><img src="img/delete_2.png" alt=""></a>
							</td>
						</tr>
				<?php
					}
				 ?>
			</table>
		</div>

<?php	
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>

