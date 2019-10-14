<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
@extends('base')

@section('main')
<div>
    <a style="margin: 19px;" href="{{ route('usuarios.create')}}" class="btn btn-primary">Novo</a>
    </div>  
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Usuarios</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Email</td>
          <td>CPF</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->usuario_id}}</td>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->cpf}}</td>

            <td>
                <a href="{{ route('usuarios.edit',$usuario->usuario_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('usuarios.destroy', $usuario->usuario_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection