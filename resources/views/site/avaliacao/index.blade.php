@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Avaliações da turma </h1>
@stop

@section('content')

    <div>
        <a class="ui inverted orange button text-black" href="{{ route('turma/cadastrarAvaliacao', ['id'=>$id]) }}">Adicionar avaliação</a>
    </div>

    <div class="mt-3">
        @if( count($avaliacoes) )
                @foreach($avaliacoes as $av)

                    <div class="ui segment">
                        <div class="ui left floated row">
                            <div class="col-6">
                                <h2>{{ $av->nome }}</h2>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('turma/editarAvaliacao', $av->id ) }}" class="ui button inverted text-primary right floated">
                                    <i class="edit outline icon"></i>Editar
                                </a>
                                <form action="{{ route('turma/deletarAvaliacao', ['id'=>$av->id]) }}">
                                    <button type="submit" class="ui button inverted text-danger right floated"><i class="trash alternate icon"></i>Excluir</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="ui clearing divider"></div>
                        {{ $av->descricao }}
                    </div>

                @endforeach
        @else
                Nenhuma avaliação foi dada para esta turma
        @endif
    </div>

@stop