<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto">
      <li @if($current=="home") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/">Home </a>
      </li>
      <li @if($current=="usuarios") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/usuarios">Usuarios</a>
      </li>
      <li @if($current=="produtos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos">Produtos</a>
      </li>
      <li @if($current=="producoes") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/producoes">Produções</a>
      </li>
      <li @if($current=="pedidos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/pedidos">Pedidos</a>
      </li>
      <li @if($current=="fornecedores") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/fornecedores">Fornecedores</a>
      </li>
      <li @if($current=="estoque") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/estoque">Estoque</a>
      </li>
      <li @if($current=="categorias") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias">Categorias</a>
      </li>
        
    </ul>

  </div>
</nav>