<html>
<head>


</head>
	<div id="bar-adm">
		<?php 
		if(isset($_SESSION['id']))
			{
				echo "Ola usuário de id <i>".$id_u. "</i>. Seja muito bem-vindo!";
				echo "<a href='sistema/deslogar.php'>Sair</a><a href='sistema/deslogar.php'>Developer</a>" ;
			}
			else
			{
				echo "Sistema 2016 - Acqua Lokos";
			}
		?>
		<div class="clear"></div>
	</div> 
	<header>
			<img src="img/logo.png" alt="">
	</header>

</html>