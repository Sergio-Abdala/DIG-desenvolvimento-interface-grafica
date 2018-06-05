<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require 'classeUsuario.php';
		
	if ($_POST['senha'] == $_POST['senha2'] && $_POST['login'] != '' && $_POST['senha'] != '') {
		echo "mandar email com link para primeiro acesso mas por enquanto cadastra direto sem conf de email...<br />";
		echo $_POST['login']."<br />";
		echo $_POST['senha']."<br />";
		echo $_POST['senha2'];
		$usu = new Usuario(0, 'system');
		echo "<script>alert('".$usu->novoUsu($conex, $_POST['login'], $_POST['senha'])."');window.location = '../';</script>";
	}else{
		if ($_POST['senha'] != $_POST['senha2']) {//SENHA QUE Ñ CONFERE OU DIFERENTE
			?>
			<script type="text/javascript">
				alert('senhas ñ conferem...');
				window.location = '../';
			</script>
			<?php
		}
		if ($_POST['login'] == '' || $_POST['senha2'] == '' || $_POST['senha'] == '') {//CAMPO VAZIO
			?>
			<script type="text/javascript">
				alert('Campos login, senha e confirmação de senha ñ podem estar vazios...');
				window.location = '../';
			</script>
			<?php
		}
	}
?>