@extends('layout.app', ["current" => "usuarios"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/usuarios" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" 
                       id="nome" placeholder="Nome">
                       <label for="email">Email</label>
                <input type="text" class="form-control" name="email" 
                       id="email" placeholder="Email">
                       <label for="nomeCategoria">CPF</label>
                <input type="text" class="form-control" name="nomeCategoria" 
                       id="cpf" placeholder="CPF">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection