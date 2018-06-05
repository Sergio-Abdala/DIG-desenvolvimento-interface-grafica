<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'funcoes.php';
	veralerta();
	require 'classeUsuario.php';
	require 'classeAdmin.php';
	
	$admin = new Admin($_COOKIE['id'], '');
	echo $admin->editPost($conex, $_POST['titulo'], $_POST['texto'])." ";

?>
<a href='../paineldecontrole.php'> voltar...</a>