<meta charset="utf-8">
<?php  
	require_once '../includes/conexao.php';
	require_once 'classePostagem.php';
	$post = new Postagem(0);
	if(isset($_GET['busca']) && $_GET['busca'] != ''){
		echo "<h3 class='cor-txt'>Buscando por: '".$_GET['busca']."'</h3>";
		$post->buscar($conex, $_GET['busca']);
	}else{
		echo "busca vazia...";
	}
	
?>