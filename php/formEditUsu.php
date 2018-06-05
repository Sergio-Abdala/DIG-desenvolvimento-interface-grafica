<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require "classeUsuario.php";
	require "classeAdmin.php";
	$admin = new Admin($_COOKIE['id'], '');
	$admin->formEditarUsu($conex);
?>