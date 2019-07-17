
@extends('adminlte::page')

@section('title', 'Sidi - Registrar turma')

@section('content_header')

    <h1>
        <a href="/turmas-listar/alunos/{{$avaliacao->id}}"><i class="long arrow alternate left icon"></i></a>
        Atividade - {{ $avaliacao->nome  }}</h1>
    <div class="ui small breadcrumb">
        <a class="section" href="{{route('home')}}">Página inicial</a>
        <i class="right chevron icon divider"></i>
        <a class="section">Turmas</a>
        <i class="right chevron icon divider"></i>
        <a class="section">Turma</a>
        <i class="right chevron icon divider"></i>
        <a href="">Avaliações</a>
        <i class="right chevron icon divider"></i>
        <a href="">Avaliação</a>
    </div>
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

