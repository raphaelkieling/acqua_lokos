<?php 
include("conexao.php");
$nome    = $_POST['nome_c'];
$usuario = $_POST['usuario_c'];
$sistema = $_POST['sistema'];
if(isset($_POST['office'])){$office  = 1;}else{$office = 0;}
if(isset($_POST['teamv'])){$teamv  = 1;}else{$teamv = 0;}
if(isset($_POST['auto'])){$auto  = 1;}else{$auto = 0;}
if(isset($_POST['queops'])){$queops  = 1;}else{$queops = 0;}
if(isset($_POST['hd'])){$hd  = 1;}else{$hd = 0;}
if(isset($_POST['processador'])){$processador  = 1;}else{$processador = 0;}
if(isset($_POST['memoria'])){$memoria  = 1;}else{$memoria = 0;}
$setor   = $_POST['setor'];
$tipo = $_POST['tipo'];
$fabricante = $_POST['fabricante'];
$ano = $_POST['ano'];
$ip =$_POST['ip'];


	if(criarInventario($conexao,$nome,$usuario,$sistema,$office,$teamv,$auto,$queops,$hd,$processador,$memoria,$setor,$tipo,$fabricante,$ano,$ip)){
		header("location:../inventario.php?sucesso=1");
	}else{
		header("location:../inventario.php?sucesso=2");
	}
?>