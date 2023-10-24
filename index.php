<?php
  session_start();

  if (array_key_exists('validacao_login',$_SESSION)){
    $validacao_login = $_SESSION['validacao_login'];
  }else{
    $validacao_login = 'n';
  }
  
  if ($validacao_login == 'ok') { //se o botão foi clicado
    $navegacao = (isset($_GET["nav"])) ? $_GET["nav"] : "inicial";
    //$navegacao = 'inicial';
    //session_destroy(); 
    //echo $nome.' | '.$email.' | '.$pagamento;
  
  } else {
    header("location: login.php");
    $navegacao = (isset($_GET["nav"])) ? $_GET["nav"] : "login";
  }
?>

<!DOCTYPE html>
<html lang="en">
<?php

include('head.php');

?>


<body onload="consumirAPI();">

  <!--navegação-->
  <?php
  include('navegacao.php');
  ?>
  <!--navegação-->



  <!--cabecalho-->
  <header class="cabecalho" id="cabecalho">
    <!--<img src="inicio.jpg" />
      <div>
        <h1>Get a free Quote</h1>

        <p>
          One day however small line of blind text by the nome Lorem Ipsum
          decided to leave for the far World of Grammar
        </p>

        <button type="button" class="botao">Download Now!</button>
      </div>-->
  </header>
  <!--cabecalho-->

  <!--conteúdo-->
  <main class="conteudo" id="conteudo">

    <?php

    switch ($navegacao) {
      case 'inicial':
        include('galeria.php');
        break;

      case 'cadastro':
        include('cadastro.php');
        break;
      case 'perfil':
        include('perfil.php');
        break;
      case 'pagamento':
        include('pagamento.php');
        break;        
      default:
        echo 'Minha variável é outra coisa';
        break;
    }

    ?>

  </main>
  <!--conteúdo-->

  <!--Paginação-->

  <?php

  if ($navegacao == 'inicial') {
    include('paginacao.php');
  }

  ?>
  <!--Paginação-->

  <!--rodapé-->
  <footer class="rodape" id="rodape">Rodapé</footer>

  <script>
    (function ($) {
      
      $('#datepicker').datepicker({ dateFormat: 'dd/mm/yy' }).val();
      $("#datepicker").mask("99/99/9999");

      //$('#datapicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
    })(jQuery)
  </script>
</body>

</html>

<!--
      <div>
        <iframe
          class="videoplay"
          src="https://drive.google.com/file/d/1DhJ9PaaL06e-bPsYiQZDhSu78FA3PNAi/preview?usp=drivesdk"
          width="600"
          height="350"
          allow="autoplay"
          allowfullscreen
        ></iframe>
      </div>
    
    -->