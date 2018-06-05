<?php  
   require_once '../includes/conexao.php';
   require '../php/classeUsuario.php';
   require '../php/classeAdmin.php';
   // Nas versões do PHP que antecedem a versão 4.1.0, é preciso usar o $HTTP_POST_FILES em vez do $_FILES.
          
   $uploaddir = '../fotos/postagens/';
   $uploadfile = $uploaddir . date("Ymdhms") ."_". basename($_FILES['fileToUpload']['name']);
   $img = date("Ymdhms") ."_". basename($_FILES['fileToUpload']['name']);
   // CADASTRAR NO BANCO DE DADOS PELO IP DA POSTAGEM... 
   $admin = new Admin($_COOKIE['id'], '');
   $admin->cadImg($conex, $img);
   //setcookie("img_post", $uploadfile,  time() + (86400), "/"); // 86400 = um dia..

   $foto = $_FILES['fileToUpload'];
   $extensoes = array(".jpg",".jpeg",".gif",".png");//extensões validas
   $ext = strrchr($foto['name'], '.');//retorna extensão do arquivo

   if (!in_array($ext, $extensoes)) {
      echo "arquivo ñ parece ser uma imagem...";
      //setcookie("img_post", "",  time() + (86400), "/"); // 86400 = um dia..
   }
      echo "<pre>";
      if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile) && in_array($ext, $extensoes)) {
            
            echo "O arquivo é valido e foi carregado com sucesso.\n";

      } else {
            echo "Algo está errado aqui!\n";
      }
             
      echo "Aqui estão algumas informações de depuração para você:";
      print_r($_FILES);

      print "</pre>";
   
      
   
?>