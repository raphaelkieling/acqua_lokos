	<nav>
				<div class="container">
					<ul>
					<?php 
							echo "<li><a href='home.php'>Principal</a></li>";
						if(Acesso($conexao,$id_u)>=2){
							echo "<li><a href='funcionario.php'>Funcionário</a></li>";
							echo "<li><a href='usuario.php'>Usuário</a></li>";
						}
						if(Acesso($conexao,$id_u)>=1){
							echo "<li><a href='criar-chamado.php'>Criar Chamados</a></li>";
						}
						if(Acesso($conexao,$id_u)>=0){
							echo "<li><a href='chamados.php'>Chamados</a></li>";
						}
						if(Acesso($conexao,$id_u)>=3){
							echo "<li><a href='inventario.php'>Inventário</a></li>";
							echo "<li><a href='telefonia.php'>Telefonia</a></li>";
						}	
						if(Acesso($conexao,$id_u)>=0){
							echo "<li><a href='report.php'>Reportar Erro</a></li>";
						}
						
						?>
					</ul>
				</div>
	</nav>
	<script src="js/jquery-3.1.1.js"></script>