<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classePostagem.php';
	require 'classeUsuario.php';
	$post = new Postagem(0);
	$post->loadPostUso($conex);
?>