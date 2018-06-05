<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classePostagem.php';
	$post = new Postagem($_GET['idPost']);
	echo $post->like($conex, 'deslike');
?>