@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Sistema Avaliativo de Disciplinas</h1>
    <div class="ui small breadcrumb">
        <a class="section" href="{{route('home')}}">Página inicial</a>
    </div>
@stop

@section('content')
    
    


    <div class="ui segment">
            <h2 class="ui left floated header">Gerenciamento de usuários</h2>
            <div class="ui clearing divider"></div>
            <p>
                <a class="ui inverted green button text-black" href="{{route('listarUser')}}">Todos os usuários</a>
                <a class="ui inverted green button text-black"  href="{{route('registrar')}}">Registrar Novo Usuário</a>
            
            </p>
    </div>

    <div class="ui segment">
            <h2 class="ui left floated header">Gerenciamento de turmas</h2>
            <div class="ui clearing divider"></div>
            <p>
                <a class="ui inverted green button text-black" href="{{route('turmas/listar')}}">Todas as turmas</a>
                <a class="ui inverted green button text-black" href="{{route('turmas/registrar')}}">Cadastrar turma</a>
                
                
            </p>
    </div>
              
@stop
