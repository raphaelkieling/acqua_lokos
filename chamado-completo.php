<?php 
	//nome chamado
	//data chamado
	//cat  chamado
	//hora chamado
	//status chamado
	//descricao chamado
	//nome criado
	//ip criador
				$id = $_GET['id'];
				include("sistema/conexao.php");
				$select  = mysqli_query($conexao,"select * from chamado where id=$id");
				while($chamado = mysqli_fetch_assoc($select)){
 ?>

	<head>
		<link rel="stylesheet" href="css/chamado-completo.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	</head>
	<center> <img src="img/logo.png" alt=""> </center>
	<center>
		<h1>Acqua lokos</h1>
		<h2>--- Relatório de chamado ---</h2></center>
	<div class="container-c">
		<table>
			<tr>
				<th>Problema:</th>
				<td>
					<?= $chamado['problema'] ?>
				</td>
			</tr>
			<tr>
				<th>Criou:</th>
				<td>
					<?= $chamado['nome']  ?>
				</td>
				<th>Funcionário:</th>
				<td>
					<?= $chamado['criador']  ?>
				</td>
			</tr>
			<tr>
				<th>Data:</th>
				<td>
					<?= $chamado['datainicial']  ?>
				</td>
				<th>Hora</th>
				<td>14:27:21</td>
			</tr>
			<tr>
				<th>Data final:</th>
				<td>
					<?= $chamado['data']  ?>
				</td>
				<th>Prazo de:</th>
				<td>
					<?= $chamado['prazo'] ." Dias" ?>
				</td>
			</tr>
			<tr>
				<th>Nivel 0</th>
				<td>
					<?= $chamado['n0']  ?>
				</td>
				<th>Nivel 1</th>
				<td>
					<?= $chamado['n1']  ?>
				</td>
			</tr>
			<tr>
				<th>Nivel 2</th>
				<td>
					<?= $chamado['n2']  ?>
				</td>
				<th>Status:</th>
				<td class="ultimo">
					<?= $chamado['status']  ?>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<th>Descrição</th>
				<td class="ultimo">
					<p>
						<?= $chamado['descricao']  ?>
					</p>
				</td>
			</tr>
		</table>
	</div>
	<?php 
}
 ?>