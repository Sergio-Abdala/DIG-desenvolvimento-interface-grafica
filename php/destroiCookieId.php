<?php  
	setcookie('id', 0, time() -1, "/"); // destruir cookie...
	header("location: ../");
?>