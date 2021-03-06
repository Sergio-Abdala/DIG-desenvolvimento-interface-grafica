<?php  
	require 'includes/conexao.php';
	$conex->query("CREATE table IF NOT EXISTS usuario(
		id bigint not null primary key auto_increment,
		nome varchar(64),
		apelido varchar(64),
		login varchar(64),
		senha varchar(32),
		data datetime
		);")or die("ñ foi possivel gerar a tabela usuario... ".mysqli_error($conex));

	$conex->query("CREATE table IF NOT EXISTS postagem(
		id bigint not null primary key auto_increment,		
		idusu bigint,
		foreign key(idusu) references usuario(id),
		titulo varchar(64),
		texto text,
		imagems varchar(1024),
		data datetime
		);")or die("ñ foi possivel gerar a tabela postagem... ".mysqli_error($conex));

	$conex->query("CREATE table IF NOT EXISTS imagens(
		id bigint not null primary key auto_increment,		
		idpost bigint,
		foreign key(idpost) references postagem(id),
		img varchar(1024)
		);")or die("ñ foi possivel gerar a tabela imagens... ".mysqli_error($conex));

	$conex->query("CREATE table IF NOT EXISTS likes(
		id bigint not null primary key auto_increment,		
		idpost bigint,
		foreign key(idpost) references postagem(id),
		idusu bigint,
		foreign key(idusu) references usuario(id),
		cond varchar(32),
		data datetime
		);")or die("ñ foi possivel gerar a tabela likes... ".mysqli_error($conex));

	$conex->query("CREATE table IF NOT EXISTS denuncias(
		id bigint not null primary key auto_increment,		
		idpost bigint,
		foreign key(idpost) references postagem(id),
		idusu bigint,
		foreign key(idusu) references usuario(id),
		cond varchar(32),
		data datetime
		);")or die("ñ foi possivel gerar a tabela denuncias... ".mysqli_error($conex));

	$conex->query("CREATE table IF NOT EXISTS usuNivel(
		id bigint not null primary key auto_increment,		
		idusu bigint,
		foreign key(idusu) references usuario(id),
		nivel varchar(32),
		data datetime
		);")or die("ñ foi possivel gerar a tabela usuNivel... ".mysqli_error($conex));
	echo "<br />tabelas geradas com sucesso...<br />";
?>