<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require_once 'classePostagem.php';
	$post = new Postagem($_GET['idPost']);
	
?>
<script type="text/javascript">
	alert('<?php echo $post->denuciarPost($conex, "absolvido"); ?>');
	window.location = '../';
</script>