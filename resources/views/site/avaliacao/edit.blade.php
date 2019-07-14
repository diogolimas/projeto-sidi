@extends('adminlte::page')


@section('content_header')
    <h1>Editando avaliação</h1>
    <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Página Principal</a></li>
            <li><a href="{{route('turmas/listar')}}">Turmas</a></li>
            <li><a href="">Descrição</a></li>
    </ol>
@stop

@section('content') 
<div class="ui container">

    <div class="ui internally celled grid">

        <div class="row">

            <div class="three wide column">
                    
            </div>

            <div class="ten wide column">
                <div class="d-block mb-4">
                    <h2 class="ui header ">
                        <a href="{{route('home')}}">
                            <i class="arrow left icon black"></i>
                        </a>
                        <!-- {{$titulo_page ?? 'Registrar nova turma'}} -->
                        {{ $avaliacao->nome }}
                    </h2>
                </div> 

                <form action="{{ route('turma/atualizarAvaliacao', ['id'=>$avaliacao->id]) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <input class="form-control" type="text" name="nomeavaliacao" placeholder="Nome da atividade" value="{{ $avaliacao->nome }}" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="text" name="descricao" placeholder="Descricao" required>{{ $avaliacao->descricao }}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-warning" type="submit">Salvar edições</button>
                    </div>
                </form>
                
            </div>
            <!--fim do formulário centralizado-->
            <div class="three wide column">
                    
            </div>
        </div>
        <!--fim da row-->
    </div>
    

</div>
@stop
