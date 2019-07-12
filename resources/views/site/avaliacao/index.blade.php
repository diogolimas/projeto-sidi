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
                        <h2>{{ $av->nome }}</h2>
                        <div class="ui divider"></div>
                        {{ $av->descricao }}
                    </div>

                @endforeach
        @else
                Nenhuma avaliação foi dada para esta turma
        @endif
    </div>

@stop