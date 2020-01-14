<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li @if ($current == "home")class="nav-item active" @endif>
              <a class="nav-link" href="/">Home <span class="sr-only">(página atual)</span></a>
            </li>
            <li @if ($current == "produtos")class="nav-item active" @endif>
              <a class="nav-link" href="/produtos">Produtos</a>
            </li>
            <li @if ($current == "categorias")class="nav-item active" @endif>
                <a class="nav-link" href="/categorias">Departamentos</a>
            </li>
          </ul>
        </div>
      </nav>
      @if (isset($current))
          {{ $current }}
      @endif