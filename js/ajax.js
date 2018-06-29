var tempoCarrossel = 5000;
function ajaxTagidUrl(tagId, url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById(tagId).innerHTML = this.responseText;
    }else{
    	document.getElementById(tagId).innerHTML = "<img src='img/carregando-pacotes.gif'>"
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
function liked(id){
  document.getElementById('respLike'+id).innerHTML = '<img src="img/carregando-pacotes.gif">';
  ajaxTagidUrl("respLike"+id, "php/like.php?idPost="+id);
  setTimeout(function(){refreshLike(id);}, 3000);  
}
function desliked(id){
  document.getElementById('respLike'+id).innerHTML = '<img src="img/carregando-pacotes.gif">';
  ajaxTagidUrl("respLike"+id, "php/deslike.php?idPost="+id);
  setTimeout(function(){refreshLike(id);}, 3000);
}
function editarPost(id){
  ajaxTagidUrl("formularioUsu", "php/editarPost.php?idPost="+id);
  document.getElementById('listaPost').innerHTML = '';
}
function excluirFoto(id){
  ajaxTagidUrl("respExcluir"+id, "php/excluirFoto.php?idFoto="+id);
}
function excluirPost(id){
  ajaxTagidUrl("formularioUsu", "php/excluirPost.php?idPost="+id);
  document.getElementById('listaPost').innerHTML = '';
}
function carroussel(){
  //alert(document.URL);
  let slide = document.URL.split('#');
  //alert(slide[1]);
  if (slide.length == 1) {
    window.location = '#target-item-1';
  }
  if (slide[1] == 'target-item-3') {
    window.location = '#target-item-1';
    document.getElementById('radio-item-1').checked = true;
  }
  if (slide[1] == 'target-item-1') {
    window.location = '#target-item-2';
    document.getElementById('radio-item-2').checked = true;
  }
  if (slide[1] == 'target-item-2') {
    window.location = '#target-item-3';
    document.getElementById('radio-item-3').checked = true;
  }
  //window.location = '#target-item-3';
  setTimeout(carroussel, tempoCarrossel);
}
function radioUm(){
  window.location = '#target-item-1';
}
function radioDois(){
  window.location = '#target-item-2';
}
function radioTres(){
  window.location = '#target-item-3';
}
function tempoInfinitoCarrossel(){
  tempoCarrossel = 3600000;
}
function verFoto(url){
  //alert(url);
  document.getElementById('fotoModal').src = url;
}
function carregarPost(id){
  ajaxTagidUrl("postagens", "php/post.php?idPost="+id);
}
function carregarPostAdmin(id){
  ajaxTagidUrl("formularioUsu", "php/post.php?idPost="+id);
}
function bloquearPost(idPost){
  //alert('id do post:=> '+idPost);
  ajaxTagidUrl("respBlock", "php/bloquearPost.php?idPost="+idPost);
  //window.location = 'php/bloquearPost.php?idPost='+id;
}
function liberarPost(idPost){
  ajaxTagidUrl("respBlock", "php/liberarPost.php?idPost="+idPost);
}
function refreshLike(idPost){
  ajaxTagidUrl("btnLike"+idPost, "php/btnLike.php?idPost="+idPost);
}