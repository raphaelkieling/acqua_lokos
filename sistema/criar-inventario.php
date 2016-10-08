<?php 
include("conexao.php");
$nome    = $_POST['nome_c'];
$usuario = $_POST['usuario_c'];
$sistema = $_POST['sistema'];
if(isset($_POST['office'])){$office  = 1;}else{$office = 0;}
if(isset($_POST['teamv'])){$teamv  = 1;}else{$teamv = 0;}
if(isset($_POST['auto'])){$auto  = 1;}else{$auto = 0;}
if(isset($_POST['queops'])){$queops  = 1;}else{$queops = 0;}
$setor   = $_POST['setor'];


	if(criarInventario($conexao,$nome,$usuario,$sistema,$office,$teamv,$auto,$queops,$setor)){
		header("location:../inventario.php?sucesso=1");
	}
?>