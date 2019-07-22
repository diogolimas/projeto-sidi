@extends('adminlte::page')


@section('content_header')
    <h1>Cadastrar nova avaliação para a turma {{$turma->disciplina}}</h1>
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
                        <a href="{{route('turma/avaliacoes', ['turma' => $turma->id])}}">
                            <i class="arrow left icon black"></i>
                        </a>
                        <!-- {{$titulo_page ?? 'Registrar nova turma'}} -->
                        Cadastrar nova avaliação
                    </h2>
                </div> 

                <form action="{{ route('turma/salvarAvaliacao') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $turma->id }}">
                    <div class="ui input mb-2 d-block">
                        <input class="form-control" type="text" name="nomeavaliacao" placeholder="Nome da atividade" required>
                    </div>
                    <div class="ui form mb-2">
                        <textarea class="form-control" type="text" name="descricao" placeholder="Descricao" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="ui inverted green button btn-lg btn-block" type="submit">Cadastrar atividade</button>
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
