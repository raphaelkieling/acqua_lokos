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

			<!-- URGENCIA  -->
			<h2>Urgência</h2>
			<?php 
				//serve para calcular o dia de "hoje" e ver quantas linhas no banco de dados estão proximas de 5 dias seguidos. >=0 <=5
				$select  = mysqli_query($conexao,"select * from chamado");
				while($chamado = mysqli_fetch_assoc($select)){
						$final = intval(substr($chamado['data'],0,2));
						$inicio= date("d");
						$resultado = $final - $inicio;
						if($resultado <= 3){ ?>
							<article>
								<div class="container-article">
									<h2><?= $chamado['problema'] ?></h2>
									<i><?= $chamado['descricao']  ?></i>
								</div>
								<div class="status-article">
									Prazo final: <br><span><?= $chamado['data'] ?></span><br>
									Situação:<br><span><?= $chamado['status'] ?></span><br>
									Status:<br><span><?= $chamado['status'] ?></span>
										<a href="chamado-completo.php">Mais...</a>
								</div>
								<div class="clear"></div>
							</article>
					<?php  	}
				}
			 ?>
			<!-- Recados -->
			<h2>Recados</h2>
			<section>
				<div class="noticia grid-5">
					<img src="img/logo.png" alt="">
					<p>Novas pessoas chegaram nos hoteis, peço a todos que recebam muito bem eles. Clientes em primeiro lugar! </p>
					<p>Dia 29</p>
				</div>
			</section>
		</div>	
</body>

<?php 
	}else{
		unset($_SESSION['id']);
		header("location:index.php");
	}
?>

