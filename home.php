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
				//serve para calcular o dia de "hoje" e ver quantas linhas no banco de dados estão proximas de 3 dias seguidos. >=0 <=3
				//existem 3 variaveis que irao calcular o dia correto que é o $final, $inicio e $resultado onde o dia final é o
				//dia em que está esclarecido no chamado onde pegamos ele com substr para cortar 2 números e deixar apenas o dia
				//dai diminuimos DIA CHAMADO($final) - DIA DE HOJE($inicio) = $resultado
				//Se $resultado for maior que zero ou menor que tres ele executa o SITUACAOCHAMADOANDAMENTO onde ele coloca
				//todos que estiverem nesse IF em "Em Prazo", se não executa o SITUACAOCHAMADO onde colocar em "Atrasado"
				$select  = mysqli_query($conexao,"select * from chamado");
				while($chamado = mysqli_fetch_assoc($select)){
						$final = intval(substr($chamado['data'],0,2));
						$inicio= date("d");
						$resultado = $final - $inicio;
						if($resultado >=0 || $resultado <=3){ 
							situacaoChamadoAndamento($conexao,$chamado['id']);
							?>
							<article>
								<div class="container-article">
									<h2><?= $chamado['problema'] ?></h2>
									<?= $chamado['descricao']  ?>
									<br><small>Problema: <?= $chamado['problema_opcao']  ?></small>
									<br><small>Criado por: <?= $chamado['criador']  ?>	</small>
								</div>
								<div class="status-article">
									Prazo final: <br><span><?= $chamado['data'] ?></span><br>
									Situação:<br><span><?= $chamado['situacao'] ?></span><br>
									Status:<br><span><?= $chamado['status'] ?></span>
								</div>
								<div class="clear"></div>
							</article>
					<?php  	}else{
							situacaoChamado($conexao,$chamado['id']);
							
						}
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

