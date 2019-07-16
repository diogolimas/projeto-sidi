@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Avaliações da turma </h1>
@stop

@section('content')

    <div>
        <a class="ui inverted green button text-black" href="{{ route('turma/cadastrarAvaliacao', ['id'=>$id]) }}">Adicionar avaliação</a>
    </div>

    <div class="mt-3">
        @if( count($avaliacoes) )
                @foreach($avaliacoes as $av)

                    <div class="ui segment">
                        <h2>{{ $av->nome }}</h2>
                        <div class="ui divider"></div>
                        {{ $av->descricao }}
                        <div class="ui divider"></div>
                        <a class="ui inverted green button text-black" href="{{route('indicador/mostrar', ['avaliacao' => $av->id])}}">Ver Indicadores</a>

                        <a class="ui inverted green button text-black" href="{{route('indicador/registrar', ['avaliacao' => $av->id])}}">Registrar indicador</a>
                    </div>

                @endforeach
        @else

            <div class="ui segment">
                <p>Nenhuma avaliação foi dada para esta turma</p>
                <div class="ui divider"></div>


        @endif
    </div>

@stop
