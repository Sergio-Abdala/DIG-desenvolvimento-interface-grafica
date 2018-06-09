<?php
	require_once '../includes/conexao.php';
	require 'classePostagem.php';

	$post = new Postagem($_GET['idPost']);
	$post->refreshLike($conex);
?>

<!--button class="like" onclick="liked('<?= $post->getId(); ?>');"-->	<i  class="fa fa-thumbs-o-up like" onclick="liked('<?= $post->getId(); ?>');">&nbsp;&nbsp;<?= $post->getLikes(); ?></i><!--/button-->&nbsp;&nbsp;&nbsp;<!--button class="deslike" onclick="desliked('<?= $post->getId(); ?>');"--> <i class="fa fa-thumbs-o-down deslike" onclick="desliked('<?= $post->getId(); ?>');">&nbsp;&nbsp;<?= $post->getDeslikes(); ?></i><!--/button-->&nbsp;&nbsp;<!--button onclick="denunciar('<?= $post->getId(); ?>');"--><img src="img/denuncia.png" style="max-height: 30px;" onclick="denunciar('<?= $post->getId(); ?>');"><!--/button-->

<?php if($post->existeDenunciaUsu($conex)  == 'denunciado'): ?>	
	&nbsp;&nbsp;&nbsp;&nbsp;<big><i class="fa fa-medkit" style="color: green;" onclick="denunciarOf('<?= $post->getId(); ?>');"></i></big>
<?php endif; ?>