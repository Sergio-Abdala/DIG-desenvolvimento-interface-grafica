<meta charset="utf-8">
<?php  
	require 'classeUsuario.php';
	require '../includes/conexao.php';
	//echo "<h1>".$_GET['nome']." ".$_GET['id'];
	$usu = new Usuario($_GET['id'], $_GET['nome']);
	$usu->novoUsu($conex, $_GET['id'], $_GET['id'])."<br />";
	$usu->load($conex);
	//echo "<h1>".$usu->getNome()."</h1>";
	header('location:../');
?>