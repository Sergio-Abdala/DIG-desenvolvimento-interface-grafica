<?php  
	require_once 'php/classePostagem.php';
	require_once 'includes/conexao.php';
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>Charqueadas Tem / DIG</title>
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
<script>
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      testAPI(response.authResponse.userID);
    } else {
      document.getElementById('status').innerHTML = 'entre com sua conta do FACEBOOK';
    }
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2021059334841626',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/pt_BR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI(userID) {
    console.log('Bem vindo!  Forneça suas informações de login.... ');
    FB.api('/me', function(response) {
      console.log('Logado como: ' + response.name);
      document.getElementById('status').innerHTML = 'Logado ao FACEBOOK como,  ' + response.name + '!';
      <?php if(!isset($_COOKIE['id'])): ?>
        if (confirm('logado como '+response.name+' pelo seu login do facebook, PERMANECER logado???')) {
        	window.location = 'php/exe_login_face.php?nome='+response.name+'&id='+userID;
        }
      <?php endif; ?>
    });
  }
</script>
	<div class="row">
		<header>
			<img src="img/logo.png" class="logotipo" alt="logotipo...">
			<div class="login" id="statusLogin">
				<!-- statusLogin.php -->
				<img src='img/carregando-pacotes.gif'>
			</div>
			<div id="tamanhoTela"></div>
			<form class="dir">
				<input type="text" name="busca" class="campo-busca" onclick="tempoInfinitoCarrossel()">
				<button class="lupa">&#128269;</button>
			</form>
		</header>
		<aside class="carroussel col-md-12 col-lg-12">
			  <span id="target-item-1"></span>
			  <span id="target-item-2"></span>
			  <span id="target-item-3"></span>
			  
			  <div class="carousel-item item-1" style="background: url('img/charqueadas1.jpg'); background-position: center;">
			  
			    <h2 class="titulo-carousel cor-txt">CharqueadasTEM...</h2>
			    <p>conteudo do slide....</p>
			  
			    <a class="arrow arrow-prev" href="#target-item-3"><img src="img/carousel-arrow-left.png" class="imgArrow"></a>
			    <a class="arrow arrow-next" href="#target-item-2"><img src="img/carousel-arrow-right.png" class="imgArrow"></a>
			  </div>
			  
			  <div class="carousel-item item-2 light" style="background: url('img/charqueadas2.jpg'); background-position: center;">
			    <h2>Item 2</h2>
			    <p>conteudo do slide....</p>
			    <a class="arrow arrow-prev" href="#target-item-1"><img src="img/carousel-arrow-left.png" class="imgArrow"></a>
			    <a class="arrow arrow-next" href="#target-item-3"><img src="img/carousel-arrow-right.png" class="imgArrow"></a>
			  </div>
			  <div class="carousel-item item-3" style="background: url('img/ifsulcharqueadas.jpg'); background-repeat: no-repeat; background-position: center;">
			    <h2>Item 3</h2>
			    <p>conteudo do slide....</p>
			    <a class="arrow arrow-prev" href="#target-item-2"><img src="img/carousel-arrow-left.png" class="imgArrow"></a>
			    <a class="arrow arrow-next" href="#target-item-1"><img src="img/carousel-arrow-right.png" class="imgArrow"></a>
			  </div>
		</aside>
		<div class="corpo">			
			<div class="col-xs-12 col-md-3 col-lg-3"><!-- MENU -->
				<nav class="container-menu">
					<ul>
						<li class="btn"><b class="cor-txt">Exibir</b>&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="totPostagens" id="totPost" style="max-width: 50px; border: none; background-color: #4f8a83;" value="4"><label for="totPost" class="cor-txt" onclick="refreshPost();"> postagens</label></li>
						<li class="btn"><a href="#" class="cor-txt" onclick="reloadIndex();"><i class="fa fa-home"></i></a></li>
						<?php 
							$post = new Postagem(0);
							$post->menuUltimosPost($conex, 10); 
						?>						
						<!--li class="btn"><a href="#" class="cor-txt">link</a></li-->
					</ul>
				</nav>
			</div>
			<div class="col-xs-12 col-md-9 col-lg-9 row" id="postagens"><!-- CONTEUDO -->
				<img src='img/carregando-pacotes.gif'>
			</div>
			<aside class="col- row">
				<?php $post->fotosPe($conex); ?>
				<!--img src="img/img.jpg" class="foto-pe col-xs-12 col-md-4 col-lg-4"-->				
			</aside>
		</div>
		<footer id="footer-principal">
			<!-- php/footer.php -->
		</footer>
	</div>
	<div id="container-modal">
		<input type="checkbox" id="modal_" />
		<div class="modal">
		  <div class="modal-content dir" style="overflow: hidden;">
		  	<img src="img/charqueadabar_background_login.jpg" class="img-opacity">
		  	 <!--style="background: url(img/charqueadabar_background_login.jpg); opacity: 0.5; filter: alpha(opacity=50);"-->
		    <h4>faça login...</h4>
		    <form action="php/logarUsuario.php" method="POST" class="dir">
		    	<label for="log">login: &nbsp;</label><input type="text" name="login" id="log" class="campo-input"><br />
		    	<label for="sen">senha: </label><input type="password" name="senha" id="sen" class="campo-input"><br />		    	   	
					<i class="fa fa-facebook-square"></i>&nbsp;&nbsp;
					<i class="fa fa-google-plus-official"></i>&nbsp;&nbsp;
					<i class="fa fa-instagram"></i>&nbsp;&nbsp;
				<input type="submit" name="btn-submit" value="entrar" class="btn">
		    </form><br />
		    <!-- FACEBOOK -->
				<div id="status"></div>
				<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
				</fb:login-button>				
			<!--/ -->
		    <h4>ou cadastre-se...</h4>
		    <form action="php/cadastrarUsuario.php" method="POST" class="dir">
		    	<label for="log">email: </label><input type="email" name="login" id="log" class="campo-input"><br />
		    	<label for="sen">senha: </label><input type="password" name="senha" id="sen" class="campo-input"><br />
		    	<label for="sen2">repetir senha: </label><input type="password" name="senha2" id="sen2" class="campo-input"><br />
		    	<input type="submit" name="btn-submit" value="cadastrar" class="btn">
		    </form>

		  </div>
		  <label class="modal-close" for="modal_"></label>
		</div>
	</div>
	<div id="container-modal2">
		<input type="checkbox" id="modal_2" />
		<div class="modal">
		  <div class="modal-content" style="width: 80%; height: 80%;">      
		    <!--h4>foto</h4-->
		    <img src="" id="fotoModal">
		  </div>
		  <label class="modal-close" for="modal_2"></label>
		</div>
	</div>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script>		
    	function tamanhos(){
    		let janelaWidth = window.innerWidth;
    		let janelaHeight = window.innerHeight;
    		document.getElementById('tamanhoTela').innerHTML = janelaWidth+" x "+janelaHeight;
    	}
    	tamanhos();
    	window.addEventListener('resize', function(){
	        tamanhos();
	    });
	    
		ajaxTagidUrl("statusLogin", "php/statusLogin.php");
		ajaxTagidUrl("footer-principal", "php/footer.php");

		<?php if(isset($_GET['busca'])): ?>
			ajaxTagidUrl("postagens", "php/busca.php?busca=<?= $_GET['busca']; ?>");
		<?php else: ?>
			ajaxTagidUrl("postagens", "php/indexPostagens.php?total="+document.getElementById('totPost').value);
		<?php endif; ?>

		function reloadIndex(){
			ajaxTagidUrl("postagens", "php/indexPostagens.php?total="+document.getElementById('totPost').value);
		}
		
		function refreshPost(){
			ajaxTagidUrl("postagens", "php/indexPostagens.php?total="+document.getElementById('totPost').value);
		}

		function denunciar(id){
			if (confirm('Você considera este conteúdo improprio ou ofensivo??')) {
				window.location = 'php/denunciarPost.php?idPost='+id;
			}else{
				alert('Denuncia abortada...');
			}
		}
		function denunciarOf(id){
			if (confirm('Você deseja cancelar a denuncia feita a esta postagem??')) {
				window.location = 'php/denunciarPostOf.php?idPost='+id;
			}else{
				alert('Denuncia mantida...');
			}
		}
		carroussel();
	</script>	
</body>
</html>