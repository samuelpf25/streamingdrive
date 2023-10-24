<?php
session_start();
if (isset($_POST['entrar'])) { //se o botão foi clicado
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $_SESSION['validacao_login'] = 'n';
    $_SESSION['id_usuario'] = 'n';
    $_SESSION['nome_usuario'] = 'n';

    include('conexao.php');

    $conexao = New Conexao;
    $conexao->conectar();
    $obj = $conexao->select("*", 'Usuario',"login='".$login."'");       
    /*echo $obj->login;
    echo $obj->senha;*/

    if ($login == $obj->login && $senha == $obj->senha) {
        $_SESSION['validacao_login'] = 'ok';
        $_SESSION['id_usuario'] = $obj->id_usuario;
        $_SESSION['nome_usuario'] = $obj->nome_usuario;
        header("location: index.php");

    }else{
        echo "Usuário e/ou senha inválidos!";
    }
    //echo $nome.' | '.$email.' | '.$pagamento;

}

?>

<?php
if (isset($_POST['acao'])) { //se o botão foi clicado
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pagamento = $_POST['pagamento'];
    $data_nascimento = $_POST['data_nascimento'];
    $texto = "('".$nome."','".$nascimento."','".$forma_pagamento."','".$login."','".$senha."')";
    /*$sql = "INSERT INTO Usuario (nome,nascimento,forma_pagamento,login,senha) VALUES ".$texto;
    echo $sql;*/


    /*INSERIR REGISTRO*/
    date_default_timezone_set('America/Sao_Paulo');
    //$pdo = new PDO('mysql:host=samsites.tech;dbname=u892138677_seriesflix', 'u892138677_seriesflix', '#Sa747400');
    $tabela = 'Usuario';
    $dados = array($nome, $nascimento, $forma_pagamento, $login, $senha);
    $momento_registro = date('Y-m-d H:i:s'); //$_POST['momento_registro'];
    $interrogacao = '?';
    //for ($i=0; $i < var_dump(count($dados)) ; $i++) { 
    //    $interrogacao = $interrogacao.',?';
    //}
    
    include('conexao.php');
    
    $conexao = New Conexao;
    $conexao->conectar();
    $texto = "('".$nome."','".$nascimento."','".$forma_pagamento."','".$login."','".$senha."')";
    $conexao->insert("Usuario (nome,nascimento,forma_pagamento,login,senha)", $texto);    

}

?>

<html>

<title>Séries Flix</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/estilo_login.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!--SCRIPTS-->
    <script type="text/javascript" src="cod.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!--<script type="text/javascript" src="pagination.js"></script>-->
</head>
<body>
<div class='geral'>
    <h1 class='titulo'>SeriesFlix</h1>
   <img class='imglogo' src='images/logo.png' width='100' height='100'>

<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
        <!--<form>
            <label for="chk" aria-hidden="true">Cadastrar</label>
            <input type="text" name="txt" placeholder="User name" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button>Sign up</button>
        </form>-->
        <form method="post">

            <label for="chk" aria-hidden="true">Cadastrar</label>

            <input type="text" name="login" placeholder="Login">

            <input type="password" name="senha" id="senha" placeholder="Senha">

            <input type="text" name="nome" placeholder="Nome">

            <input type="email" name="email" placeholder="E-mail">

            <select name="pagamento" aria-label="Forma de pagamento">
                <option selected>Selecione a forma de pagamento</option>
                <option value="1">Mensal</option>
                <option value="2">Anual</option>
            </select>

            <input type="text" name="data_nascimento" id="datepicker" placeholder="Data de nascimento">

            <button type="submit" name="acao" value="Salvar">Salvar</button>
        </form>
    </div>

    <div class="login">
        <form method="post">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="text" name="login" placeholder="Login" required="">
            <input type="password" name="senha" placeholder="Senha" required="">
            <button name="entrar" value="Entrar">Entrar</button>
        </form>
    </div>
</div>
</div><!-- geral -->
</body>

</html>