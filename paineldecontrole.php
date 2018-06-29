<?php  
	require 'php/classeUsuario.php';
	require_once 'includes/conexao.php';
	require_once 'php/classePostagem.php';
	if (isset($_COOKIE['id'])) {
		$usu = new Usuario($_COOKIE['id'], '');
		$usu->load($conex);
		$post = new Postagem(0);
	}
	
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>Painel de controle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="charqueadasTem site para fins academicos...">
    <meta name="author" content="Sérgio Abdala...">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/desenhando.png">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/grid.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="row">
		<header>
			<div class="dir"><a href="php/destroiCookieId.php" class="btn"><i class="fa fa-user-secret"></i> &nbsp; <small style="color: red;"><b id="usunivel"></b> sair...</small> </a></div><div id="statusLogin" class="dir"></div>
		</header>		
		<div class="row corpo">
			<nav class="col-xs-12 col-md-3 col-xl-2" ><!-- MENU -->
				<ul>
					<li class="btn menu" onclick="home();">Pagina inicial</li>
					<li class="btn menu" onclick="insereFormularioPost();">Postar</li>
					<li class="btn menu" onclick="editar();"> Postagens <small class="alerta"> editar</small></li>
					<li class="btn menu" onclick="insereFormulario();">Login & Senha <small class="alerta">editar</small></li>
					<?php if(isset($_COOKIE['id']) && $usu->getNivel() == 'admin'): ?>
						<div id="menuAdmin">
							<li><h5>Restrito ao administrador <small class="alerta"> e agora</small></h5></li>
							<li class="btn menu" onclick="carregaDenuncias();">denuncias <?php echo $post->contDenunciasPorCond($conex, 'denunciado'); ?> </li>
						</div>
					<?php endif; ?>
				</ul>
			</nav>
			<div class="col-xs-12 col-md-8 col-xl-10" >
				<div style="float: left;" class="row">
					<div id="formularioUsu" class="col-xs-8 col-md-8 col-xl-5"></div>
					<div id="listaPost" style="padding-left: 15px;" class="row"></div><!-- painelPostagemLoad.php -->
				</div>
			</div>
		</div>
		<footer id="footer-principal"> <!-- php/footer.php --> </footer>
	</div>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript">		
		ajaxTagidUrl("statusLogin", "php/status.php");
		ajaxTagidUrl("footer-principal", "php/footer.php");
		
		function insereFormulario(){
			ajaxTagidUrl("formularioUsu", "php/formEditUsu.php");
		}
		function insereFormularioPost(){ajaxTagidUrl("formularioUsu", "php/formpostar.php");}
		function home(){window.location='./';}
		function editar(){
			ajaxTagidUrl("listaPost", "php/painelPostagemLoad.php");
		}
		ajaxTagidUrl("usunivel", "php/usunivel.php");
		function carregaDenuncias(){
			//alert('listar denuncias');
			ajaxTagidUrl("listaPost", "php/carregaDenuncias.php");
		}
	</script>
</body>
</html>