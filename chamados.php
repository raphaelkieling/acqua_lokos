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
		<center>
			<?php include("header.php");?>
		</center>
		<?php include("menu.php") ?>
			<div class="container section-home">

				<!--		INCLUI A BARRA DE SUCESSO-->
				<?php include("barra-sucesso.php");?>

					<!-- Chamados  -->
					<h2>Chamados</h2>
					<form action="chamados.php">
					<table>
						<tr><td><select name="filtro" id="">
							<option value="0">Nada</option>
							<option value="1">Criador do Chamado</option>
							<option value="2">Data</option>
							<option value="3">Menor Prazo</option>
							<option value="4">Maior Prazo</option>
							<option value="5">Descricao</option>
							<option value="6">Dúvida</option>
							<option value="7">Problema</option>
							<option value="8">CONCLUIDOS</option>
						</select></td></tr>
						<tr><td><input name="filtrot" type="text" placeholder="Palavra chave...(OPCIONAL)"></td></tr>
						<tr><td>	<input type="submit" value="Filtrar" id="filtrar-chamado"></td></tr>
					</table>
						

						
					
					</form>

					<?php 
			
		  include("filtros.php");
		  while($chamado = mysqli_fetch_assoc($select)){?>
						<?php if(Acesso($conexao,$id_u)>3 && $_GET['filtro']!="8"){ ?>
							<!-- Botão de deletar -->
							<a href="sistema/deletar-chamado.php?id=<?php echo $chamado['id'] ?>"><img src="img/delete_2.png" class="mais_chamado" alt=""></a>
							<!-- Botão de mais! -->
							<a href="chamado-completo.php?id=<?php echo $chamado['id'] ?>"><img src="img/mais.png" class="mais_chamado" alt=""></a>
							<!-- Botão de modificar!-->
							<a href="modificar-chamado.php?id_modificar=<?php echo $chamado['id'] ?>"><img src="img/configuracao.png" class="mais_chamado" alt=""></a>

							<?php } ?>
								<article>
									<div class="container-article">
										<h2><?= $chamado['problema'] ?></h2>
										<?= $chamado['descricao']  ?>
											<br><small>Problema: <?= $chamado['problema_opcao']  ?></small>
											<br><small>Criado por: <?= $chamado['criador']  ?>	</small>
									</div>
									<div class="status-article">
										Prazo final:
										<br><span><?= $chamado['data'] ?></span>
										<br> Situação:
										<br><span><?= $chamado['situacao'] ?></span>
										<br> Status:
										<br><span><?= $chamado['status'] ?></span>
									</div>
									<div class="clear"></div>
								</article>
								<?php  } ?>

			</div>
			<script src="js/jquery-3.1.1.js"></script>
			<script>
				
			</script>
	</body>

	<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>