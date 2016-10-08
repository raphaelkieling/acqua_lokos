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
			<!-- Chamados  -->
			<h2>Chamados</h2>
			<form action="chamados.php">
				<select name="filtro" id="">
					<option value="0">Nada</option>
					<option value="1">Criador do Chamado</option>
					<option value="2">Data</option>
					<option value="3">Menor Prazo</option>
					<option value="4">Maior Prazo</option>
					<option value="5">Descricao</option>
					<option value="6">Dúvida</option>
					<option value="7">Defeito</option>
				</select>

				<input name="filtrot" type="text" placeholder="Palavra chave...(OPCIONAL)">
				<input type="submit" value="Filtrar" id="filtrar-chamado">
			</form>
		<?php 
				include("filtros.php");
				while($chamado = mysqli_fetch_assoc($select)){?>
							<?php if(Acesso($conexao,$id_u)>3){ ?>
								<a href="sistema/deletar-chamado.php?id=<?php echo $chamado['id'] ?>"><img src="img/delete_2.png" class="delete_chamado" alt=""></a>
								<a href="chamado-completo.php?id=<?php echo $chamado['id'] ?>""><img src="img/mais.png" class="mais_chamado" alt=""></a>
							<?php } ?>
							<article>
								<div class="container-article">
									<h2><?= $chamado['problema'] ?></h2>
									<?= $chamado['descricao']  ?>
									<br><small>Problema: <?= $chamado['problema_opcao']  ?></small>
									<br><small>Criado por: <?= $chamado['criador']  ?>	</small>
								</div>
								<div class="status-article">
									Prazo final: <br><span><?= $chamado['data'] ?></span><br>
									Situação:<br><span><?= $chamado['status'] ?></span><br>
									Status:<br><span><?= $chamado['status'] ?></span>
								</div>
								<div class="clear"></div>
							</article>
					<?php  } ?>

		</div>	
</body>

<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>

