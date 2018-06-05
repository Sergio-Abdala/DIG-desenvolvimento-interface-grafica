<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require_once 'classeUsuario.php';
	require_once 'classePostagem.php';
	$post = new Postagem($_GET['idPost']);
	$post->loadPostUnico($conex);
?>