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

        @if(count($avaliacoes) )

                    <table class="ui green table">
                        <thead>
                            <tr>
                                <th width="150px">Avaliação</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($avaliacoes as $av)
                            <tr>
                                <td >{{$av->nome}}</td>
                                <td width="1000px">{{$av->descricao}}</td>
                                <td>

                                    <a style="width: 50px;"
                                       class="ui inverted yellow button" href="">
                                        <i class="edit icon "></i>
                                    </a>
                                    <a style="width: 50px;"
                                        class="ui inverted red button" href="">
                                        <i class="trash alternate outline icon"></i>
                                    </a>
                                    <a class="ui inverted blue button"  style="width: 50px;" href="{{route('turma/verAvaliacao',['id'=>$av->id]) }}">
                                        <i class="eye icon"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

        @else
            <div class="ui segment">
                <p>Nenhuma avaliação foi dada para esta turma</p>
                <div class="ui divider"></div>
        @endif
    </div>

@stop
