<meta charset="utf-8">
<?php  
	require '../includes/conexao.php';
	require 'classeUsuario.php';
	$usu = new Usuario($_COOKIE['id'], '');
	$usu->load($conex);
	echo "logado como: ".$usu->getNome();
?>