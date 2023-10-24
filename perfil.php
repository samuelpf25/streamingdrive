<?php
if (isset($_POST['salva_perfil'])) { //se o botão foi clicado
    $perfil_nome = $_POST['perfil_nome'];
    $generos = $_POST['valor'];

    //iterando no array valor[] do checkbox
    foreach ($_POST['valor'] as $key => $value) {

        echo $key;
        echo '=>';
        echo $value;

        echo '<hr>';
    }


}

?>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Bem vindo, <?php $_SESSION['nome_usuario'] ?></label>
    </div>

    <div class="mb-3">
        <label for="pagamento" class="form-label">Perfis existentes</label>
        <select class="form-select" name="pagamento" aria-label="Forma de pagamento">
            <option selected>Selecione o perfil para editar</option>
            <option value="1">Perfil 1</option>
            <option value="2">Perfil 2</option>
        </select>
    </div>


    <div class="mb-3">
        <label for="perfil_nome" class="form-label">Nome do Perfil</label>
        <input type="text" class="form-control" name="perfil_nome" placeholder="Nome do Perfil">

    </div>

    <div class="mb-3">
        <label class="form-label">Gêneros de vídeos:</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name='valor[]' value="comedia"id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Comédia
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name='valor[]' value="acao" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
            Ação
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name='valor[]' value="romance" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Romance
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name='valor[]' value="aventura" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Aventura
        </label>
    </div>

    <input type="submit" class="btn btn-outline-success" name="salva_perfil" value="Salvar" />
</form>