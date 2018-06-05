<meta charset="utf-8">
<?php  
	echo "<br /><h1 class='alerta'> Postagem liberada</h1>";
	require '../includes/conexao.php';
	require 'classePostagem.php';
	$post = new Postagem($_GET['idPost']);
	echo $post->AdminSetDenuncia($conex, 'julgado-aval-ok');
?>