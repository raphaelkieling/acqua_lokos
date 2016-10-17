<?php 
				if(isset($_GET['sucesso'])=="1"){
					echo "<div class='yes'>Sucesso</div>";
				}else if(isset($_GET['cadastrado'])=="2"){
					echo "<div class='no'>Ocorreu um erro</div>";
				}
?>