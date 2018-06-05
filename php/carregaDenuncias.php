<meta charset="utf-8">
<?php  
	require '../includes/conexao.php';
	require 'classePostagem.php';
	$post = new Postagem(0);
	echo $post->listDenunciasPorCond($conex, 'denunciado');
?>