<?php
	require_once '../includes/conexao.php';
	require 'classePostagem.php';

	$post = new Postagem($_GET['idPost']);
	$post->refreshLike($conex);
?>

<button class="like" onclick="liked('<?= $post->getId(); ?>');">	<i  class="fa fa-thumbs-o-up">&nbsp;&nbsp;<?= $post->getLikes(); ?></i></button>&nbsp;&nbsp;&nbsp;<button class="deslike" onclick="desliked('<?= $post->getId(); ?>');"> <i class="fa fa-thumbs-o-down">&nbsp;&nbsp;<?= $post->getDeslikes(); ?></i></button>&nbsp;&nbsp;<button onclick="denunciar('<?= $post->getId(); ?>');"><img src="img/denuncia.png" style="max-height: 50px;"></button>
<?php if($post->existeDenunciaUsu($conex)  == 'denunciado'): ?>
	<button onclick="denunciarOf('<?= $post->getId(); ?>');"><big><i class="fa fa-medkit" style="color: green;"></i></big></button>
<?php endif; ?>