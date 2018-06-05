<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classeUsuario.php';
	require 'classeAdmin.php';
	if (isset($_GET['idPost'])) {// SE EXISTIR O $_GET[]
		$post = new Admin($_COOKIE['id'], '');
		$post->formEditPost($conex);
	}
	

?>