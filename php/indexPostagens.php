<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classePostagem.php';
	require 'classeUsuario.php';//contem conexao.php
	$post = new Postagem(0);
	$post->indexPost($conex, $_GET['total']);
?>