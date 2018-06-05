<meta charset="utf-8">
<?php  
	require 'classePostagem.php';
	require 'classeUsuario.php';
	$post = new Postagem(0);
	$post->contLike($conex);
?>