<?php
$conex = new mysqli('localhost', 'root', '', 'lpwiii');
if ($conex->connect_error) {
  die('Erro na Conexão (' . $conex->connect_errno . ') ' . 
          $mysqli->connect_error);
}else{
	echo "<script>console.log('conexão mysqli ok...');</script>";
}