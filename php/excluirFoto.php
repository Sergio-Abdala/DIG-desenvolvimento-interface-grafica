<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classePostagem.php';
	$post = new Postagem(0);
	echo $post->excluirFoto($conex, $_GET['idFoto']);
?>