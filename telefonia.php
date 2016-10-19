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
		<form action="sistema/criar-telefonia.php" method="get">
			<!--  Barra de administração onde fica o nome de bem vindo-->
			<center>
				<?php include("header.php");?>
			</center>
			<?php include("menu.php") ?>

				<!-- Aparecer a barra de sucesso quando a pessoa se cadastrar com sucesso -->
				<div class="container section-home">

					<!--		INCLUI A BARRA DE SUCESSO-->
					<?php include("barra-sucesso.php");?>

						<!-- Criar Telefonia -->
						<h2>Telefonia</h2>

						<table class="noveoito dado" >
						<tr>
							<th>Funcionario:</th>
							<td>
							<select name="funcionario" id="">
									<?php 
										$select = mostrarFuncionario($conexao);
										while($funcionario = mysqli_fetch_assoc($select)){
											echo"<option value=".$funcionario['id'].">".$funcionario['nome']."</option>";
										}
									?>
							</select>
							</td>
						</tr>
						
						<tr >
							<th>Telefone</th>
							<td>
								<input type="number" name="telefone">
							</td>	
							<td><p>2 chips</p><input type="checkbox" id="chip"></td>
						</tr>
						<tr>
							<td></td>
							<td colspan="1">
								<input type="submit">
							</td>
						</tr>
						</table>
					</form>		
					<!--					TABELA DE NUMEROS CADASTRADOS-->
					<h2>Cadastrados</h2>
					<table class="bordb">
						<tr>
							<th>Funcionário</th>
							<th>Telefone</th>
							<th>Excluir</th>
						</tr>
						<?php 
					$select = mostrarTelefone($conexao);
					while($telefone = mysqli_fetch_assoc($select)){ ?>
							<tr>
								<td>
									<?php echo $telefone['nome'] ?>
								</td>
								<td>
									<?php echo $telefone['telefone'] ?>
									</td>
									<td>
									<a href=<?php echo "sistema/deletarTelefone.php?id=".$telefone[ 'idt']; ?>><img src="img/delete_2.png" alt=""></a>
								</td>
							</tr>
							<?php
					}
				 ?>
					</table>
		</div>
			<script src="js/jquery-3.1.1.js"></script>
			<script>
				var select = 0;
				$('#chip').click(function(){
					if(select==0){
						 $(".dado").append("<tr class='chip2'><th>Proximo Chip:</th><td ><input type='numer' id='numero' name='telefone_c_2'><td/></tr>");
						 select=1;
					}else if(select==1){
						$('.chip2').remove();
						select=0;
					}
				});
			</script>
	</body>
	<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>