@extends('layout.app', ["current" => "usuarios" ])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Usuarios</h5>

        <table class="table table-ordered table-hover" id="tabelaUsuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
       
    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" role="button" onClick="novoUsuario()">Novo Usuario</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgUsuarios">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <form class="form-horizontal" id="formUsuarios">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuario</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nome" class="control-label">Nome</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nome" placeholder="Nome">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="control-label">CPF</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cpf" placeholder="CPF">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="control-label">Quantidade</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
     
     
     
@section('javascript')
<script type="text/javascript">
    
    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });*/
    
    function novoUsuario() {
        $('#id').val('');
        $('#nome').val('');
        $('#cpf').val('');
        $('#email').val('');
    }

    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.cpf + "</td>" +
            "<td>" + p.email + "</td>" +
            "<td>" +
              '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
              '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +
            "</tr>";
        return linha;
    }
    
    function editar(id) {
        $.getJSON('/api/usuarios/'+id, function(data) { 
            console.log(data);
            $('#id').val(data.id);
            $('#nome').val(data.nome);
            $('#cpf').val(data.cpf);
            $('#email').val(data.email);       
        });        
    }
    
    function remover(id) {
        $.ajax({
            type: "DELETE",
            url: "/api/produtos/" + id,
            context: this,
            success: function() {
                console.log('Apagou OK');
                linhas = $("#tabelaProdutos>tbody>tr");
                e = linhas.filter( function(i, elemento) { 
                    return elemento.cells[0].textContent == id; 
                });
                if (e)
                    e.remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    function carregarProdutos() {
        $.getJSON('/api/usuarios', function(usuarios) { 
            for(i=0;i<usuarios.length;i++) {
                linha = montarLinha(usuarios[i]);
                $('#tabelaUsuarios>tbody').append(linha);
            }
        });        
    }
    
    function criarUsuario() {
        usu = { 
            nome: $("#nome").val(), 
            preco: $("#cpf").val(), 
            estoque: $("#email").val(), 
        };
        $.post("/api/usuarios", usu, function(data) {
            usuario = JSON.parse(data);
            linha = montarLinha(usuario);
            $('#tabelaUsuarios>tbody').append(linha);            
        });
    }
    
    function salvarProduto() {
        usu = { 
            id : $("#id").val(), 
            nome: $("#nome").val(), 
            preco: $("#cpf").val(), 
            estoque: $("#email").val(), 
        };
        $.ajax({
            type: "PUT",
            url: "/api/usuarios/" + usu.id,
            context: this,
            data: usu,
            success: function(data) {
                usu = JSON.parse(data);
                linhas = $("#tabelaUsuarios>tbody>tr");
                e = linhas.filter( function(i, e) { 
                    return ( e.cells[0].textContent == usu.id );
                });
                if (e) {
                    e[0].cells[0].textContent = usu.id;
                    e[0].cells[1].textContent = usu.nome;
                    e[0].cells[2].textContent = usu.cpf;
                    e[0].cells[3].textContent = usu.email;
                }
            },
            error: function(error) {
                console.log(error);
            }
        });        
    }
    
    $("#formUsuario").submit( function(event){ 
        event.preventDefault(); 
        if ($("#id").val() != '')
            salvarUsuario();
        else
            criarUsuario();
            
        $("#dlgUsuarios").modal('hide');
    });
    
    $(function(){
        //carregarCategorias();
        carregarUsuarios();
    })
    
</script>
@endsection
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     