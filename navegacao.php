<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="/images/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"
          style="opacity: 0.5; border-radius: 50%;">
        SeriesFlix</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='?nav=inicial' onclick="consumirAPI();">Página
              Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='?nav=cadastro' onclick="">Cadastro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='?nav=perfil' onclick="">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href='https://buy.stripe.com/test_6oEg0g7ey4b4foAdQQ' onclick="">Assinar</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Séries
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="#" serie="chaves" temporada="1" onclick="filtraMenu(this);">Chaves</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" serie="Luluzinha" temporada="1" onclick="filtraMenu(this);">Luluzinha -
                  Temporada 1</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" serie="A Turma do Pateta" temporada="1" onclick="filtraMenu(this);">A Turma do Pateta</a>
              </li>              
            </ul>
          </li>
        </ul>

        <input style="max-width: 200px" id="pesquisar" class="form-control me-2" type="search" placeholder="Pesquisar"
          aria-label="Search" />
        <button class="btn btn-outline-success" type="button" onclick="pesquisar();">
          Pesquisar
        </button>

        <?php

          if (isset($_GET['sair'])) {
            session_destroy(); 
            //header("location: login.php");
          }
          if ($validacao_login=='ok') { 
            echo "<a class='btn btn-outline-success' href='login.php?sair=true' style='padding: 0 5px;'>Sair</a>";
          }
        ?>
      </div>
    </div>
  </nav>