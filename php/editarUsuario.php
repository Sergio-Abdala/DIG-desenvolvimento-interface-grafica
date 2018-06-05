<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require "classeUsuario.php";
	require "classeAdmin.php";

	if (isset($_COOKIE['id'])) {
		echo "<p class='info'>";
		$admin = new Admin($_COOKIE['id'], '');
		echo $admin->editUso($conex, $_GET['nome'], $_GET['apelido'], $_GET['login'], $_GET['senha']);
		echo "<p>";
	}
?>