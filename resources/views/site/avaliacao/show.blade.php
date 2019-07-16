
<!--
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>HOME</h3>
        <p>Some content.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Menu 1</h3>
        <p>Some content in menu 1.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
        <h3>Menu 2</h3>
        <p>Some content in menu 2.</p>
    </div>
</div>
-->

@extends('adminlte::page')


@section('content_header')
    <h1>Atividade - {{ $avaliacao->nome  }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Página Principal</a></li>
        <li><a href="{{route('turmas/listar')}}">Turmas</a></li>
        <li><a href="{{route('turmaVerMais', ['id'=>$avaliacao->id_turma])}}">Descrição</a></li>
    </ol>
@stop

@section('content')

    <div class="ui">

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Descrição</a>
            <a class="item" data-tab="second">Indicadores</a>
            <a class="item" data-tab="third">Notas</a>
        </div>

        <div class="ui bottom attached tab segment active" data-tab="first">
            <p>
                {{ $avaliacao->descricao }}
            </p>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
            <a class="ui inverted green button text-black" href="{{route('indicador/registrar', ['avaliacao' => $avaliacao->id])}}">Registrar indicador</a>
            <div>
                <table class="ui celled striped table mt-3">
                    <thead>
                    <tr>
                        <th class="collapsing">Nota máxima</th>
                        <th>Descrição do Indicador</th>
                    </tr></thead>
                    <tbody>
                        @foreach($indicadores as $indicador)
                            <tr>
                                <td>{{$indicador->nota_maxima}}</td>
                                <td>{{$indicador->descricao_indicador}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="ui bottom attached tab segment " data-tab="third">
                <table class="ui celled striped table mt-3">
                        <thead>
                            <tr>
                                <th class="collapsing">Aluno</th>
                                @foreach($indicadores as $indicador)
                                    <th>{{$indicador->descricao_indicador}} (0 - {{$indicador->nota_maxima}})</th>
                                @endforeach
                                <th>Nota final</th>
                            </tr></thead>
                            <tbody>
                            @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{$aluno->name}}</td>
                                    @foreach($indicadores as $indicador)
                                        <td> <input type="number" max="{{ $indicador->nota_maxima }}"> </td>
                                    @endforeach
                                    <td><label for="">Opa</label></td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
        </div>



    </div>

    <script>
        window.onload = function() {
            $('.menu .item').tab();
        };
    </script>

@stop

