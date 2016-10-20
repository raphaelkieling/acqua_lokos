<?php
				// Nao ordena por nada
				if(empty($_GET['filtro']) || $_GET['filtro']=="0"){
					$_GET['filtro'] = "0";
					$select  = mysqli_query($conexao,"select * from chamado");
				}
				// Ordena pelo criador
				if($_GET['filtro']=="1" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado order by criador asc");
				}
				if($_GET['filtro']=="1" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where criador like '%$nome%' order by criador asc");
				}
				// Ordena pela Data
				if($_GET['filtro']=="2" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado order by data asc");
				}
				if($_GET['filtro']=="2" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where data like '%$nome%' order by data asc");
				}
				// Ordena pelo prazo menor
				if($_GET['filtro']=="3" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado order by prazo asc");
				}
				if($_GET['filtro']=="3" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where prazo like '%$nome%' order by prazo asc");
				}
				// Ordena pelo prazo maior
				if($_GET['filtro']=="4" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado order by prazo desc");
				}
				if($_GET['filtro']=="4" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where prazo like '%$nome%' order by prazo desc");
				}
				// Ordena pela descrição do problema
				if($_GET['filtro']=="5" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado order by descricao asc");
				}
				if($_GET['filtro']=="5" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where descricao like '%$nome%' order by descricao asc");
				}
				// Ordena pela opcao DEFEITO
				if($_GET['filtro']=="6" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado  where problema_opcao ='Dúvida' order by problema_opcao asc");
				}
				if($_GET['filtro']=="6" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where problema_opcao like '%Duvida%' order by problema_opcao asc");
				}
				// Ordena pela opcao DUVIDA
				if($_GET['filtro']=="7" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado  where problema_opcao ='Problema' order by problema_opcao asc");
				}
				if($_GET['filtro']=="7" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado where problema_opcao like '%Problema%' order by problema_opcao asc");
				}
      	// Pega todos os concluidos
				if($_GET['filtro']=="8" && $_GET['filtrot']==""){
					$select  = mysqli_query($conexao,"select * from chamado_concluido order by nome");
				}
				if($_GET['filtro']=="8" && $_GET['filtrot']!=""){
					$nome = $_GET['filtrot'];
					$select  = mysqli_query($conexao,"select * from chamado_concluido where problema like '%$nome%' order by nome");
				}
?>
