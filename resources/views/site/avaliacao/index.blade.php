@extends('adminlte::page')

@section('title', 'Avaliações - SIDI')

@section('content_header')
    <h1>
        <a href="{{url('/turmas-listar/alunos',['id'=>$id])}}">
            <i class="long arrow alternate left icon">

            </i>
        </a>
        Avaliações da turma
    </h1>
@stop

@section('content')

    <div>
        <a class="ui inverted green button text-black" href="{{ route('turma/cadastrarAvaliacao', ['id'=>$id]) }}">Adicionar avaliação</a>
    </div>

    <div class="mt-3">
        @if( count($avaliacoes) )
                @foreach($avaliacoes as $av)

                    <a href="{{ route('turma/verAvaliacao', ['id'=>$av->id])  }}">
                        <div class="ui segment mt-3">
                            <h2>{{ $av->nome }}</h2>
                            <div class="ui divider"></div>
                            {{ $av->descricao }}
                        </div>
                    </a>
                @endforeach
        @else
            <div class="ui segment">
                <p>Nenhuma avaliação foi dada para esta turma</p>
                <div class="ui divider"></div>
        @endif
    </div>

@stop
