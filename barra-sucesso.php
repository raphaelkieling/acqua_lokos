<?php 
				if(isset($_GET['sucesso'])){
					$sucess = $_GET['sucesso'];
					if($sucess==1){
						echo "<div class='yes'>Sucesso</div>";
					}else if($sucess==2){
						echo "<div class='no'>Ocorreu um erro</div>";
					}
				}
				
?>