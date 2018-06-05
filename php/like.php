<meta charset="utf-8">
<?php  
	require 'classePostagem.php';
	require_once '../includes/conexao.php';
	$post = new Postagem($_GET['idPost']);
	echo $post->like($conex, 'like');
?>