@extends('layout.app', ["current" => "usuarios"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <table class="table table-bordered table-stripped table-hover">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Email</th>
    </tr>
        @foreach ($usuarios as $usuarios)
        {
            
        }
    </table>
</div>

@endsection