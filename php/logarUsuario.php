<meta charset="utf-8">
<?php  
	require 'classeUsuario.php';
	require '../includes/conexao.php';
		
	if ($_POST['login'] != '' && $_POST['senha'] != '') {
		echo $_POST['login']."<br />";
		echo $_POST['senha']."<br />";
		$usu = new Usuario(0, 'system');
		echo "<script>alert('".$usu->logar($conex, $_POST['login'], $_POST['senha'])."');window.location = '../';</script>";
	}else{
		if ($_POST['senha'] == '') {//SENHA vazio
			?>
			<script type="text/javascript">
				alert('campo senha vazio...');
				window.location = '../';
			</script>
			<?php
		}
		if ($_POST['login'] == '') {//CAMPO VAZIO
			?>
			<script type="text/javascript">
				alert('Campos login ñ pode estar vazio...');
				window.location = '../';
			</script>
			<?php
		}
	}
?>