<?php
if (isset($_POST['acao'])) { //se o botão foi clicado
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $forma_pagamento = $_POST['pagamento'];
    $nascimento = $_POST['data_nascimento'];
    //echo $nome.' | '.$email.' | '.$pagamento;
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

<form method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" placeholder="Login">

    </div>

    <div class="mb-3">
        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha">

    </div>

    <div class="mb-3">
        <label for="nome" class="form-label">Nome completo</label>
        <input type="text" class="form-control" name="nome" placeholder="Nome">

    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail">

    </div>
    <div class="mb-3">
        <label for="pagamento" class="form-label">Forma de pagamento</label>
        <select class="form-select" name="pagamento" aria-label="Forma de pagamento">
            <option selected>Selecione a forma de pagamento</option>
            <option value="1">Mensal</option>
            <option value="2">Anual</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de nascimento</label>
        <input type="text" class="form-control" name="data_nascimento" id="datepicker" placeholder="Data de nascimento"
            maxlength="10">

    </div>

    <input type="submit" class="btn btn-outline-success" name="acao" value="Salvar" />
</form>