<?php 
/**
 * classe para carregar postagens do banco de dados...
 */
class Postagem /*extends AnotherClass*/
{
	protected $id;
	protected $likes;
	protected $deslikes;
	function __construct($id)
	{
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	function getLikes(){
		return $this->likes;
	}
	function getDeslikes(){
		return $this->deslikes;
	}
	function setId($id){
		$this->id = $id;
	}
	function loadPost($conex){ // conforme $this->id
		$query = $conex->query("SELECT * FROM postagem WHERE id = '".$this->id."';");
		if ($query) {
			$con = $query->fetch_object();
			if ($con->titulo != NULL || $con->texto != NULL) {
				$this->contLike($conex);
				$foto = array();
				$query2 = $conex->query("SELECT * FROM imagens WHERE idpost = '".$con->id."';");
				if ($query2) {
					while ($consulta = $query2->fetch_object()) {
						$foto[] = $consulta->img;
					}
				}
				?>
					<section class="col- col-xs-12 col-md-6">
						<h2><?= $con->titulo; ?></h2>
						<?php if(isset($foto[0])): ?>
							<div class="foto col- col-md-6 row">
								<label for="modal_2">
									<div class="label-ft-index">
										<img src="fotos/postagens/<?= $foto[0]; ?>" class="col-" id="foto<?= $con->id; ?>" onclick="verFoto(document.getElementById('foto<?= $con->id; ?>').src);">
									</div>
								</label>
								<?php foreach ($foto as $k => $val) {
										?> <div  class="col- col-xs-4 ft-pequena"> <img src="fotos/postagens/<?= $foto[$k]; ?>" onclick="document.getElementById('foto<?= $con->id; ?>').src = 'fotos/postagens/<?= $foto[$k]; ?>';" class="col-"> </div> <?php
								} ?>
							</div>
						<?php endif; ?>
						<p class="cor-txt tam-txt"><?= substr($con->texto, 0, 600); ?>...<br />
						 <?php if(strlen($con->texto) > 600): ?>
						  <small style="color: green;" onclick="document.getElementById('continua<?= $this->id; ?>').style.display='block';
						document.getElementById('small<?= $this->id; ?>').style.display='none';" id="small<?= $this->id; ?>"> Continuar...</small> <!-- MUDAR ESTE SMALL E O BOTÃO ver / abrir -->
						<?php endif; ?>
						 </p>
						 <p class="cor-txt tam-txt" style="display: none;" id="continua<?= $this->id; ?>"><?= substr($con->texto, 580); ?><br />
						 	<small style="color: green;" onclick="document.getElementById('continua<?= $this->id; ?>').style.display='none';
						document.getElementById('small<?= $this->id; ?>').style.display='block';" id="small<?= $this->id; ?>"> Ocultar...</small></p>						
						<footer class="col-">
							<?php  
								$usu = new Usuario($con->idusu, '');
								$usu->load($conex);
							?>
							publicado por: <?= $usu->getNome(); ?> <small style="font-size: 12px;">em <?= $con->data; ?></small>
						</footer>
						<div class="row" id="btnLike<?= $this->getId(); ?>">
							<!-- btnLike.php -->
							<button class="like" onclick="liked('<?= $this->getId(); ?>');">	<i  class="fa fa-thumbs-o-up">&nbsp;&nbsp;<?= $this->getLikes(); ?></i></button>&nbsp;&nbsp;&nbsp;<button class="deslike" onclick="desliked('<?= $this->getId(); ?>');"> <i class="fa fa-thumbs-o-down">&nbsp;&nbsp;<?= $this->getDeslikes(); ?></i></button>&nbsp;&nbsp;<button onclick="denunciar('<?= $this->getId(); ?>');"><img src="img/denuncia.png" style="max-height: 50px;"></button>
							<?php if($this->existeDenunciaUsu($conex)  == 'denunciado'): ?>
								<button onclick="denunciarOf('<?= $this->getId(); ?>');"><big><i class="fa fa-medkit" style="color: green;"></i></big></button>
							<?php endif; ?>
						</div>	
						<p id="respLike<?= $this->id; ?>"></p><!-- tem que numerar essa bagaça pois tem um pra cada postagem ??????????? -->
						<button onclick="carregarPost('<?= $this->id; ?>')" class="btn menu">Ver / Abrir</button>
					</section>
				<?php
			}
		}else{
			echo mysqli_error($conex);
		}
	}
	function loadPostUnico($conex){ // conforme $this->id
		$query = $conex->query("SELECT * FROM postagem WHERE id = '".$this->id."';");
		if ($query) {
			$con = $query->fetch_object();
			if ($con->titulo != NULL || $con->texto != NULL) {
				$this->contLike($conex);
				$foto = array();
				$query2 = $conex->query("SELECT * FROM imagens WHERE idpost = '".$con->id."';");
				if ($query2) {
					while ($consulta = $query2->fetch_object()) {
						$foto[] = $consulta->img;
					}
				}
				?>
					<section class="col-">
						<h2><?= $con->titulo; ?></h2>
						<?php if(isset($foto[0])): ?>
							<div class="foto col- col-md-6">
								<div  class="label-ft-index">
									<label for="modal_2"><img src="fotos/postagens/<?= $foto[0]; ?>" class="col-" id="foto<?= $con->id; ?>" onclick="verFoto(document.getElementById('foto<?= $con->id; ?>').src);" class="foto-index"></label>
								</div>
								<div class="">
								<?php foreach ($foto as $k => $val) {
									//if ($k != 0) {
										?><img src="fotos/postagens/<?= $foto[$k]; ?>" class="col- col-xs-4" onclick="document.getElementById('foto<?= $con->id; ?>').src = 'fotos/postagens/<?= $foto[$k]; ?>';" style='padding: 10px 10px 10px 10px;'><?php
									//}
								} ?>
								</div>
							</div>
						<?php endif; ?>
						<p class="cor-txt tam-txt"><?= substr($con->texto, 0, 600); ?>...<br />
						 <?php if(strlen($con->texto) > 600): ?>
						  <small style="color: green;" onclick="document.getElementById('continua<?= $this->id; ?>').style.display='block';
						document.getElementById('small<?= $this->id; ?>').style.display='none';" id="small<?= $this->id; ?>"> Continuar...</small> 
						<?php endif; ?>
						 </p>
						 <p class="cor-txt tam-txt" style="display: none;" id="continua<?= $this->id; ?>"><?= substr($con->texto, 580); ?><br />
						 	<small style="color: green;" onclick="document.getElementById('continua<?= $this->id; ?>').style.display='none';
						document.getElementById('small<?= $this->id; ?>').style.display='block';" id="small<?= $this->id; ?>"> Ocultar...</small></p>
						<footer class="col-">
							<?php  
								$usu = new Usuario($con->idusu, '');
								$usu->load($conex);
							?>
							publicado por: <?= $usu->getNome(); ?> <small style="font-size: 12px;">em <?= $con->data; ?></small>
						</footer>
						<button class="like" onclick="liked('<?= $this->id; ?>');">	<i  class="fa fa-thumbs-o-up">&nbsp;&nbsp;<?= $this->likes; ?></i></button>&nbsp;&nbsp;&nbsp;<button class="deslike" onclick="desliked('<?= $this->id; ?>');"> <i class="fa fa-thumbs-o-down">&nbsp;&nbsp;<?= $this->deslikes; ?></i></button>&nbsp;&nbsp;<button onclick="denunciar('<?= $this->id; ?>');"><img src="img/denuncia.png" style="max-height: 50px;"></button>
						<?php if($this->existeDenunciaUsu($conex)  == 'denunciado'): ?>
							<button onclick="denunciarOf('<?= $this->id; ?>');"><big><i class="fa fa-medkit" style="color: green;"></i></big></button>
						<?php endif; ?><br>
						<p id="respLike<?= $this->id; ?>"></p>
						<?php $usuNow = new Usuario($_COOKIE['id'], ''); $usuNow->load($conex); ?>
						<?php if($usuNow->getNivel() == 'admin'): ?>
							
								<button class='btn col- col-md-6 col-lg-3' onclick="bloquearPost('<?= $this->id; ?>');"><strong class="alerta">Bloquear</strong></button>
							
								<button class='btn col- col-md-6 col-lg-3' onclick="liberarPost('<?= $this->id; ?>');"><strong class="alerta">Liberar</strong></button>
							
							<b id="respBlock"></b>
						<?php endif; ?>
					</section>
				<?php
			}
		}else{
			echo mysqli_error($conex);
		}
	}
	function AdminSetDenuncia($conex, $cond){ // denunciado, absolvido, julgado-aval-ok,  julgado-aval-no, 
		if (isset($_COOKIE['id'])) {
			$resp = $conex->query("SELECT * FROM denuncias WHERE idpost = '".$this->id."';")or die(mysqli_error($conex));
			if ($resp && $resp->num_rows > 0) {
				$vorta='';
				while ($den = $resp->fetch_object()) {
					$mudis = $conex->query("UPDATE denuncias SET cond = '".$cond."' WHERE id = '".$den->id."';");
					if ($mudis) {
						$vorta = 'condição da postagem alterada com sucesso para '.$cond;
						
					}else{
						return 'falha no registro, tente novamente...';
					}
				}				
			}else{
				$denunciado = $conex->query("INSERT INTO denuncias(idpost, idusu, cond, data) VALUES('".$this->id."', '".$_COOKIE['id']."', '".$cond."', now());");
				if ($denunciado) {
					return 'condição da postagem alterada com sucesso para '.$cond;
				}else{
					return 'falha no registro, tente novamente... '.mysqli_error($conex);
				}
			}
		}else{
			return 'Você precisa estar logado para acessar este recurso..!';
		}
	}
	function loadPostAdmin($conex){ // conforme $this->id
		$query = $conex->query("SELECT * FROM postagem WHERE id = '".$this->id."';");
		if ($query) {
			$con = $query->fetch_object();
			if ($con->titulo != NULL || $con->texto != NULL) {
				/*echo "<br />id post: ".$con->id;
				echo "<br />id usu: ".$con->idusu;
				echo "<br />imagems: ".$con->imagems;
				echo "<br />data: ".$con->data."<hr>";*/
				$this->contLike($conex);
				$foto = array();
				$query2 = $conex->query("SELECT * FROM imagens WHERE idpost = '".$con->id."';");
				if ($query2) {
					while ($consulta = $query2->fetch_object()) {
						$foto[] = $consulta->img;
					}
				}
				?>
					<section class="col-">
						<h2><?= $con->titulo; ?></h2>
						<?php if(isset($foto[0])): ?>
							<img src="fotos/postagens/<?= $foto[0]; ?>" class="foto col- col-md-6 col-lg-3">
						<?php endif; ?>
						<p class="cor-txt"><?= $con->texto; ?></p>
						<footer class="col-">
							<?php  
								$usu = new Usuario($_COOKIE['id'], '');
								$usu->load($conex);
							?>
							publicado por: <?= $usu->getNome(); ?> <small style="font-size: 12px;">em <?= $con->data; ?></small>
						</footer>
						<button class="like" onclick="liked('<?= $this->id; ?>');">	<i  class="fa fa-thumbs-o-up">&nbsp;&nbsp;<?= $this->likes; ?></i></button>&nbsp;&nbsp;&nbsp;<button class="deslike" onclick="desliked('<?= $this->id; ?>');"> <i class="fa fa-thumbs-o-down">&nbsp;&nbsp;<?= $this->deslikes; ?></i></button><br>
						<p id="respLike<?= $this->id; ?>"></p><!-- tem que numerar essa bagaça pois tem um pra cada postagem ??????????? -->
					</section>
				<?php
			}
		}else{
			echo mysqli_error($conex);
		}
	}
	function loadPostUso($conex){ //pega id das postagens do usuario
		$query = $conex->query("SELECT id FROM postagem WHERE idusu = '".$_COOKIE['id']."' && (titulo != 'NULL' || texto != 'NULL') ORDER BY id DESC;");
		if ($query) {
			while ($con = $query->fetch_object()) {
				echo "<div class='col- row contorno'>";
				$this->setId($con->id);
				$this->loadPostAdmin($conex);
				?>
					<!-- BOTÕES EDITAR E EXCLUIR... -->
					<div class="col- row">
						<button onclick="editarPost(`<?= $con->id; ?>`);" class="btn menu col- col-xs-12 col-md-6 col-lg-3 col-xl-2" style="max-height: 40px;">Editar</button>&nbsp;&nbsp;&nbsp;<button onclick="excluirPost(`<?= $con->id; ?>`);" class="btn menu col- col-xs-12 col-md-6 col-lg-3 col-xl-2" style="max-height: 40px;">Excluir</button>
					</div>
						
				<?php
				echo "</div>";
			}
		}
	}
	function contLike($conex){
		//LIKE
		$contaLike = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'like' && idpost = '".$this->id."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC")or die(mysqli_error($conex));
		if ($contaLike && $contaLike->num_rows > 0) {
			while ($like = $contaLike->fetch_object()) {
				//echo '<br />id post: '.$like->idpost."  Qtd likes: ".$like->Qtd;
				$this->likes = $like->Qtd;
			}
		}else{
			//echo "<br />id post: ".$this->id." 0 likes...";
			$this->likes = 0;
		}
		//DESLIKE
		$contaDeslike = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'deslike' && idpost = '".$this->id."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC")or die(mysqli_error($conex));
		if ($contaDeslike && $contaDeslike->num_rows > 0) {
			while ($deslike = $contaDeslike->fetch_object()) {
				//echo '<br />id post: '.$deslike->idpost."  Qtd deslikes: ".$deslike->Qtd;
				$this->deslike = $deslike->Qtd;
			}
		}else{
			//echo "<br />id post: ".$this->id." 0 deslikes...";
			$this->deslikes = 0;
		}
	}
	function avaliaIdPost($conex, $idpost){
		$query = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  denuncias WHERE cond = 'julgado-aval-no' && idpost = '".$idpost."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ;");
		if ($query && $query->num_rows > 0) {
			return 0;
		}else{
			return $idpost;
		}
	}
	function indexPost($conex, $total){
		// LIKE como fazer para saber se idpost da tabela likes ñ conta como julgado-aval-no na tabela denuncias ???
		$totalExcesso20 = $total + 20;
		$conta = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'like' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC LIMIT ".$totalExcesso20)or die(mysqli_error($conex));
		if ($conta) {
			$cont=0;
			while ($like = $conta->fetch_object()) {
				//echo '<br />id post: '.$like->idpost."  Qtd likes: ".$like->Qtd;
				$this->likes = $like->Qtd;
				if ($cont < $total) {// gambiarra folga na busca para poder suprimir os post julgado-aval-no
					if ($this->avaliaIdPost($conex, $like->idpost)) {
						$this->setId($this->avaliaIdPost($conex, $like->idpost));
						$this->loadPost($conex);
						$cont++;
					}
				}					
				//DESLIKE
				$contades = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'deslike' && idpost = '".$this->id."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC LIMIT ".$total)or die(mysqli_error($conex));
				if ($contades && $contades->num_rows > 0) {
					while ($deslike = $contades->fetch_object()) {
						//echo '<br />id post: '.$like->idpost."  Qtd likes: ".$like->Qtd;
						$this->deslikes = $deslike->Qtd;
					}
				}else{
					$this->deslikes = 0;
				}				
			}
		}else{
			echo "falha na conexão sql...";
		}
	}
	function like($conex, $cond){
		if (isset($_COOKIE['id'])) {
			$resp = $conex->query("SELECT * FROM likes WHERE idpost = '".$this->id."' && idusu = '".$_COOKIE['id']."';");
			if ($resp && $resp->num_rows > 0) {
				$lik = $resp->fetch_object();
				$mudis = $conex->query("UPDATE likes SET cond = '".$cond."' WHERE id = '".$lik->id."';");
				if ($mudis) {
					return 'Preferencia alterada...';
				}else{
					return 'falha na alteração, tente novamente...';
				}
			}else{
				$liked = $conex->query("INSERT INTO likes(idpost, idusu, cond, data) VALUES('".$this->id."', '".$_COOKIE['id']."', '".$cond."', now());");
				if ($liked) {
					return 'preferencia registrada...';
				}else{
					return 'falha no registro, tente novamente... '.mysqli_error($conex);
				}
			}
		}else{
			return 'Você precisa estar logado para acessar este recurso..!';
		}
	}
	function refreshLike($conex){
		//LIKE
		$conta = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'like' && idpost = '".$this->id."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC")or die(mysqli_error($conex));
		if ($conta && $conta->num_rows > 0) {
			while ($like = $conta->fetch_object()) {
				//echo '<br />id post: '.$like->idpost."  Qtd likes: ".$like->Qtd;
				$this->likes = $like->Qtd;
			}
		}else{
			$this->likes = 0;
		}
		//DESLIKE
		$contades = $conex->query("SELECT   idpost, COUNT(idpost) AS Qtd FROM  likes WHERE cond = 'deslike' && idpost = '".$this->id."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC")or die(mysqli_error($conex));
		if ($contades && $contades->num_rows > 0) {
			while ($deslike = $contades->fetch_object()) {
				//echo '<br />id post: '.$like->idpost."  Qtd likes: ".$like->Qtd;
				$this->deslikes = $deslike->Qtd;
			}
		}else{
			$this->deslikes = 0;
		}
	}
	function excluirFoto($conex, $idFoto){
		$query = $conex->query("DELETE FROM imagens WHERE id = '".$idFoto."';");
		if ($query) {
			return "foto excluida..!";
		}
	}
	function excluirPost($conex){
		$likes = $conex->query("DELETE FROM likes WHERE idPost = '".$this->id."';");
		if ($likes) {
			$img = $conex->query("DELETE FROM imagens WHERE idPost = '".$this->id."';");
			if ($img) {
				$post = $conex->query("DELETE FROM postagem WHERE id = '".$this->id."';");
				if ($post) {
					return 'Postagem excluida com sucesso..!';
				}else{
					return 'erro na exclusão da postagem';
				}
			}else{
				return 'erro na exclusão de imagens..!';
			}
		}else{
			return 'erro na exclusão da tabela likes';
		}
	}
	function menuUltimosPost($conex, $qtd){
		$qtd += 20; //folga na busca para suprimir post julgado-aval-no
		$query = $conex->query("SELECT * FROM postagem WHERE titulo != 'NULL' ORDER BY id DESC LIMIT ".$qtd.";");
		if ($query) {
			$cont=0;
			while ($post = $query->fetch_object()) {
				if($cont < 10){
					if ($this->avaliaIdPost($conex, $post->id)) {
						$cont++;
						?> <li class="btn cor-txt" onclick="carregarPost('<?= $post->id; ?>')"><!--a href="#php/postagem.php?id=<?= $post->id; ?>" class="cor-txt"--><?= $post->titulo; ?><!--</a--></li> <?php 
					}
				}					
			}
		}
	}
	function fotosPe($conex){
		$query = $conex->query("SELECT * FROM imagens ORDER BY id DESC LIMIT 30;");
		$img = array();
		$idPost = array();
		if($query){
			while ($foto = $query->fetch_object()) {
				
				if ($this->avaliaIdPost($conex, $foto->idpost)) {
					$idPost[] = $foto->idpost;
					$img[] = $foto->img;
				}
				
			}
		}
		$total = count($img);
		for ($i=0; $i < 4; $i++) { 
			$ort[$i] = rand(0, $total-1);
		}
		foreach ($ort as $k => $val) {
			?><div class="foto-pe col-xs-12 col-sm-6 col-md-4 col-lg-3" onclick="carregarPost('<?= $idPost[$val]; ?>');"> <img src="fotos/postagens/<?= $img[$val]; ?>" class="col-"  style="max-height: 250px;"> </div><?php
		}
	}
	function buscar($conex, $parametro){
		$query = $conex->query("SELECT id, titulo, texto, data FROM postagem WHERE titulo LIKE '%".$parametro."%' OR texto LIKE '%".$parametro."%';");
		if ($query) {
			echo "<ul>";
			while ($resp = $query->fetch_object()) {
				//$resp->id;
				if ($this->avaliaIdPost($conex, $resp->id)) {
					?> <li><a href='#idPost=<?= $resp->id; ?>' onclick="carregarPost('<?= $resp->id; ?>');">
							<p><b class="resul-busca-tit"><?php echo $resp->titulo; ?></b><br />&nbsp;&nbsp;&nbsp;<small><?php echo substr($resp->texto, 0, 200); ?>...</small></p>
						</a></li> <?php
				}else{
					//link para admin ver post bloqueado fica oculto para uso ???
					echo "<li><p> Bloqueado pelo moderador...</p></li>";
				}	
			}
			echo "</ul>";
		}else{
			//busca vazia...
			echo "<p>Nenhuma postagem corresponde a sua pesquisa...</p>";
		}
	}
	function denuciarPost($conex, $cond){ // denunciado, absolvido, julgado-aval-ok,  julgado-aval-no, 
		if (isset($_COOKIE['id'])) {
			$resp = $conex->query("SELECT * FROM denuncias WHERE idpost = '".$this->id."' && idusu = '".$_COOKIE['id']."';")or die(mysqli_error($conex));
			if ($resp && $resp->num_rows > 0) {
				$den = $resp->fetch_object();
				if ($den->cond == 'julgado-aval-no' || $den->cond == 'julgado-aval-ok') {
					return 'Postagem já avaliada por um de nossos moderadores...';
				}else{
					$mudis = $conex->query("UPDATE denuncias SET cond = '".$cond."' WHERE id = '".$den->id."';");
					if ($mudis) {
						if ($cond == 'absolvido') {
							return 'Postagem foi absolvida, denuncia cancelada...';
						}else{
							return 'Você JÁ denunciou esta postagem para que seja avaliada por um de nossos moderadores...';
						}
						
					}else{
						return 'falha no registro, tente novamente...';
					}
				}
			}else{
				$denunciado = $conex->query("INSERT INTO denuncias(idpost, idusu, cond, data) VALUES('".$this->id."', '".$_COOKIE['id']."', '".$cond."', now());");
				if ($denunciado) {
					return 'Você denunciou esta postagem para que seja avaliada por um de nossos moderadores......';
				}else{
					return 'falha no registro, tente novamente... '.mysqli_error($conex);
				}
			}
		}else{
			return 'Você precisa estar logado para acessar este recurso..!';
		}
	}
	function existeDenunciaUsu($conex){
		if (isset($_COOKIE['id'])) {
			$resp = $conex->query("SELECT * FROM denuncias WHERE idpost = '".$this->id."' && idusu = '".$_COOKIE['id']."';")or die(mysqli_error($conex));
			if ($resp && $resp->num_rows > 0) {
				$den = $resp->fetch_object();
				return $den->cond;
			}
		}else{
			return 'sem registro';
		}
	}
	function contDenunciasPorCond($conex, $cond){
		$queryContCond = $conex->query("SELECT idpost, COUNT(idpost) AS Qtd FROM  denuncias WHERE cond = '".$cond."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC");
		if ($queryContCond && $queryContCond->num_rows > 0) {
			$vorta=array();
			while ($reg = $queryContCond->fetch_object()) {
				$vorta[] = $reg->idpost;
			}
			return "<small class='alerta'> ".count($vorta)." </small>";
		}else{
			return "<small class='verde'> 0 </small>";
		}
	}
	function listDenunciasPorCond($conex, $cond){
		$queryContCond = $conex->query("SELECT idpost, COUNT(idpost) AS Qtd FROM  denuncias WHERE cond = '".$cond."' GROUP BY idpost HAVING   COUNT(idpost) > 0 ORDER BY COUNT(idpost) DESC");
		if ($queryContCond && $queryContCond->num_rows > 0) {
			$vorta=array();
			while ($reg = $queryContCond->fetch_object()) {
				//echo "<br />".$reg->idpost." ".$reg->Qtd;
				$query = $conex->query("SELECT id, titulo, texto, data FROM postagem WHERE id = '".$reg->idpost."';");
				if ($query) {
					while ($resp = $query->fetch_object()) {
						$resp->id;
						echo "<ul>";
						?> <a href='#idPost=<?= $resp->id; ?>' onclick="carregarPostAdmin('<?= $resp->id; ?>');"><li>
								<p class="resul-busca-tit"><?php echo $resp->titulo; ?></p>
								<p class="resul-busca-cor"><?php echo substr($resp->texto, 0, 200); ?></p>
							</li></a> <?php
						echo "</ul>";
					}
				}else{
					//busca vazia...
					echo "<p>Nenhuma postagem corresponde a sua pesquisa...</p>";
				}
			}
			//return "<small class='alerta'> ".count($vorta)." </small>";
		}else{
			//return "<small class='verde'> 0 </small>";
		}
	}
} ?>