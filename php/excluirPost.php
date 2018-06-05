<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classePostagem.php';
	$post = new Postagem($_GET['idPost']);
	echo "<h2>".$post->excluirPost($conex)."<h2>";
?>