<meta charset="utf-8">
<?php  
	require '../includes/conexao.php';
	require 'classeUsuario.php';
	$u = new Usuario($_COOKIE['id'], '');
	$u->load($conex);
	echo $u->getNivel();
?>