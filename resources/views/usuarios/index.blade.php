@extends('layout.app', ["current" => "usuarios"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <table class="table table-bordered table-stripped table-hover">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->nome }}</td>
            <td>{{ $usuario->cpf }}</td>
            <td>{{ $usuario->email }}</td>
            <td><a href="{{ route('usuarios.editar', $usuario->id )}}" class="btn btn-warning">Editar</a></td>
            <td><a href="{{ route('usuarios.remover', $usuario->id )}}" class="btn btn-danger">Remover</a></td>
        </tr>
        @endforeach
    </table>
</div>

@endsection