	<?php include("estilo.php") ?>
<body>

		<!--  Barra de administração onde fica o nome de bem vindo-->
		<center> <?php include("header.php");?> </center>

		<div class="container-login">
			<p id="h1_login">Login.</p>
			<div id="box_login">
				<form action="sistema/logar.php" method="post">
					<input type="text" name="id" placeholder="ID DE ACESSO" autofocus><br>
					<input type="password" name="password" placeholder="SENHA">
					<input type="submit" id="botao_login" value="acesso">
				</form>
			</div>
		</div>

</body>
</html>