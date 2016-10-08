<?php
	include('conexao.php') ;

	if(isset($_POST['id'])){$id    =  $_POST['id'];}
	if(isset($_POST['password'])){$senha =	$_POST['password'];}
	if(isset($_POST['id']) && isset($_POST['password']))
	{
		logar($conexao,$id,$senha);
	}
	
?>