<?php  
	//session_start();
	function veralerta(){
		@session_start();
		if(isset($_SESSION['msg'])){
			?>	<script type="text/javascript">
					alert('<?= $_SESSION['msg']; ?>');
				</script>
			<?php			
		}
		session_destroy();
	}
?>