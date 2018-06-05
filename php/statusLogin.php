<meta charset="utf-8">
<?php  
	if (isset($_COOKIE['id']) && $_COOKIE['id'] != 0) {
		require 'classeUsuario.php';
		require_once '../includes/conexao.php';
		$usu = new Usuario($_COOKIE['id'], '');
		$usu->load($conex);
		?>
		<a href="paineldecontrole.php"><i class="fa fa-address-card-o">&nbsp;&nbsp;<?= $usu->getNome(); ?></i></a><!--small><a href="php/destroiCookieId.php">sair...</a></small-->&nbsp;&nbsp;<small style="font-size: 12px; color: red;"> logado</small>
		<?php
		# code...
	}else{
		?>
		<label for="modal_" onclick="tempoInfinitoCarrossel();">
			<div id="gr-social"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;
				<i class="fa fa-facebook-square"></i>&nbsp;&nbsp;
				<i class="fa fa-google-plus-official"></i>&nbsp;&nbsp;
				<i class="fa fa-instagram"></i>
			</div>
		</label>
		<?php
	}
?>