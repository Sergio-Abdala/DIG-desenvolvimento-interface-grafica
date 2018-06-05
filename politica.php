<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Politicas de Privacidade Charqueadas TEM...</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>  

    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Política de privacidade <a href='http://charqueadastem.com.br'>TEM</a></h2><p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.</p><p>A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para o tem.</p><p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem o tem serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p><p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p><p>O uso do tem pressupõe a aceitação deste Acordo de privacidade. A equipa do tem reserva-se ao direito de alterar este acordo sem aviso prévio. Deste modo, recomendamos que consulte a nossa política de privacidade com regularidade de forma a estar sempre atualizado.</p><h2>Os anúncios</h2><p>Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.</p><!--h2>Cookie DoubleClick Dart</h2><p>O Google, como fornecedor de terceiros, utiliza cookies para exibir anúncios no nosso website;</p><p>Com o cookie DART, o Google pode exibir anúncios com base nas visitas que o leitor fez a outros websites na Internet;</p><p>Os utilizadores podem desativar o cookie DART visitando a Política de <a href='http://politicaprivacidade.com/' title='privacidade da rede de conteúdo'>privacidade da rede de conteúdo</a> e dos anúncios do Google.</p--><h2>Os Cookies e Web Beacons</h2><p>Utilizamos cookies para armazenar informação, tais como as suas preferências pessoas quando visita o nosso website. Isto poderá incluir um simples popup, ou uma ligação em vários serviços que providenciamos, tais como fóruns.</p><p>Em adição também utilizamos publicidade de terceiros no nosso website para suportar os custos de manutenção. Alguns destes publicitários, poderão utilizar tecnologias como os cookies e/ou web beacons quando publicitam no nosso website, o que fará com que esses publicitários (como o Google através do Google AdSense) também recebam a sua informação pessoal, como o endereço IP, o seu ISP, o seu browser, etc. Esta função é geralmente utilizada para geotargeting (mostrar publicidade de Lisboa apenas aos leitores oriundos de Lisboa por ex.) ou apresentar publicidade direcionada a um tipo de utilizador (como mostrar publicidade de restaurante a um utilizador que visita sites de culinária regularmente, por ex.).</p><p>Você detém o poder de desligar os seus cookies, nas opções do seu browser, ou efetuando alterações nas ferramentas de programas Anti-Virus, como o Norton Internet Security. No entanto, isso poderá alterar a forma como interage com o nosso website, ou outros websites. Isso poderá afetar ou não permitir que faça logins em programas, sites ou fóruns da nossa e de outras redes.</p><h2>Ligações a Sites de terceiros</h2><p>O tem possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p><p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-6">
                <a href="http://sistemasparamim.com/" target="blank">
                    &copy; Copyright 2017 - by Sérgio Abdala
                </a>
            </div>
            <div class="col-sm-6">
                <a href="http://charqueadastem.com.br/politica_privacidade.php" target="blank">Politicas de privacidade</a>
                <!--ul class="pull-right">
                    <li><a href="index.php">inicio</a></li>
                    <li><a href="quem_somos.php">Quem somos</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="contato.php">contato</a></li>
                </ul-->                    
            </div>              
        </div>
    </div>
</div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
            document.getElementById('btn-x9').addEventListener('click', function(){
                $.ajax({
                  type: 'POST',
                  url: "relatar_erro.php",
                  data:{uri: "<?= $_SERVER['SCRIPT_NAME']; ?>", msg:document.getElementById('x9').value }, 
                  success: function(result){
                    $("#div1").html(result);
                    
                  }
                });
            });                
    </script>
</body>

</html>
