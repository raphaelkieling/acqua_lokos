<?php 
	//nome chamado
	//data chamado
	//cat  chamado
	//prazo determinado
	//hora chamado
	//status chamado
	//descricao chamado
	//nome criado
	//ip criador
	include('sistema/logar.php');
	session_start();
	if(isset($_SESSION['id'])){
		$id_u = $_SESSION['id'];?>
	<!-- Caso exista um usuario ele faz tudo se nao, ele sai -->

	<head>
		<!-- Estilo da pagina -->
		<?php include("estilo.php") ?>

	</head>

	<body>
		<form action="sistema/criar-inventario.php" method="post">
			<!--  Barra de administração onde fica o nome de bem vindo-->
			<center>
				<?php include("header.php");?>
			</center>
			<?php include("menu.php") ?>

				<!-- Aparecer a barra de sucesso quando a pessoa se cadastrar com sucesso -->
				<div class="container section-home">

					<!--		INCLUI A BARRA DE SUCESSO-->
					<?php include("barra-sucesso.php");?>

						<!-- Criar Inventario -->
						<h2>Inventário</h2>

						<table class="noveoito">
							<tr>
								<th>Nome Computador:</th>
								<th>Usuário:</th>
								<th>Sistema:</th>
								<th>Office:</th>
								<th>TeamV:</th>
								<th>AutomatizeSis:</th>
								<th>Queóps:</th>
							</tr>
							<tr>
								<td>
									<input name="nome_c" type="text">
								</td>
								<td>
									<select name="usuario_c" id="">
										<?php 
							$select = mostrarFuncionario($conexao);
							while($funcionario = mysqli_fetch_assoc($select)){
								echo"<option value=".$funcionario['id'].">".$funcionario['nome']."</option>";
							}
							?>
									</select>
								</td>
								<td>
									<select name="sistema" id="">
										<option value="Windows XP">Windows XP</option>
										<option value="Windows 8">Windows 8</option>
										<option value="Windows 8.1">Windows 8.1</option>
										<option value="Windows 10">Windows 10</option>
										<option value="Outro">Outro</option>
									</select>
								</td>
								<td>
									<input name="office" type="checkbox" value="0">
								</td>
								<td>
									<input name="teamv" type="checkbox" value="0">
								</td>
								<td>
									<input name="auto" type="checkbox" value="0">
								</td>
								<td>
									<input name="queops" type="checkbox" value="0">
								</td>
							</tr>
							<tr>
								<th>Setor:</th>
								<td colspan="6">
									<select name="setor" id="" class="noveoito">
										<option value="Bilheteria">Bilheteria</option>
										<option value="CallCenter">CallCenter</option>
										<option value="Recepção">Recepção</option>
										<option value="Financeiro">Financeiro</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan='7'>
									<input type="Submit" value="Inventariar">
								</td>
							</tr>
						</table>
						<table class="bordb">
							<tr>
								<th>Id</th>
								<th>Nome PC</th>
								<th>Usuário</th>
								<th>Sistema</th>
								<th>Office</th>
								<th>Team Viewer</th>
								<th>AutomatizeSis</th>
								<th>Queops</th>
								<th>Setor</th>
								<th>Excluir</th>
							</tr>
							<?php 
					$select = mostrarInventario($conexao);
					while($inventario = mysqli_fetch_assoc($select)){ ?>
								<tr>
									<td>
										<?= $inventario['id'] ?>
									</td>
									<td>
										<?= $inventario['nome_c'] ?>
									</td>
									<td>
										<?= $inventario['nome'] ?>
									</td>
									<td>
										<?= $inventario['sistema'] ?>
									</td>
									<td>
										<?php if(isset($inventario['office']) && $inventario['office']=="1"){echo "Sim";}else{echo "-";} ?>
									</td>
									<td>
										<?php if(isset($inventario['teamv']) && $inventario['teamv']=="1"){echo "Sim";}else{echo "-";} ?>
									</td>
									<td>
										<?php if(isset($inventario['automatize']) && $inventario['automatize']=="1"){echo "Sim";}else{echo "-";} ?>
									</td>
									<td>
										<?php if(isset($inventario['queops']) && $inventario['queops']=="1"){echo "Sim";}else{echo "-";} ?>
									</td>
									<td>
										<?= $inventario['setor_i'] ?>
									</td>
									<td><a href=<?php echo 'sistema/deletarInventario.php?id='.$inventario[ 'id']; ?>><img src="img/delete.png" alt=""></a></td>
								</tr>

								<?php } ?>
						</table>
				</div>
		</form>

	</body>

	<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>