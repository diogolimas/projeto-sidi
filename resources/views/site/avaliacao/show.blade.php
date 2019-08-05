
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




            <a class="ui inverted green button text-black"
            href="{{route('indicador/registrar', ['avaliacao' => $avaliacao->id])}}">Registrar indicador
            </a>
            <div>
                <table class="ui celled striped table mt-3">
                    <thead>
                    <tr>
                        <th class="collapsing">Nota máxima</th>
                        <th>Descrição do Indicador</th>
                        <th>Ações</th>
                    </tr></thead>
                    <tbody>
                        @foreach($indicadores1 as $indicador1)
                            <tr>
                                <td>{{$indicador1->nota_maxima}}</td>
                                <td>{{$indicador1->descricao_indicador}}</td>
                                <td>
                                    <a style="width: 51px;" class="ui inverted yellow button" href="{{ route('turmas/editar', ['id'=>$indicador1->id]) }}">
                                        <i class="edit outline icon"></i>
                                    </a>
                                    <button style="width: 51px;" data-id="{{$indicador1->id}}" data-name="{{$indicador1->descricao_indicador}}" data-action="excluir" class="excluir ui inverted red button">
                                        <i class="trash alternate outline icon"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--NOTAS -->
        <div class="ui bottom attached tab segment " data-tab="third">
                <table class="ui celled striped table mt-3">
                        <thead>
                            <tr>
                                <th class="collapsing">Aluno</th>
                                @foreach($indicadores1 as $indicador1)
                                    <th>{{$indicador1->descricao_indicador}} (0 - {{$indicador1->nota_maxima}})</th>
                                @endforeach

                                <th>Nota Na Atividade</th>
                            </tr>
                        </thead>
                            <tbody>
                            <form action="{{route('atribuir-nota', ['avaliacao' => $avaliacao->id])}}" method="POST">
                            @foreach($alunos as $aluno_index => $aluno)
                                <tr>
                                    <td width="200px">
                                        {{$aluno->name}}
                                    </td>
                                    @foreach($indicadores as $indicador)
                                        @if($indicador->id_aluno == $aluno->id_user)
                                                <td width="50px">
                                                        {!!csrf_field()!!}
                                                    <div class="ui input">
                                                    <input class="" type="number" max="{{ $indicador->nota_maxima }}"
                                                     name="notas[]" value="{{$indicador->nota_indicador}}">
                                                    </div>
                                                </td>
                                        @endif
                                    @endforeach

                                    @if(isset($nota_avaliacao))
                                        <td><label for="">{{$nota_avaliacao[$aluno_index]->nota_avaliacao}}</label></td>
                                    @else
                                        <td><label for="">0</label></td>
                                    @endif
                                </tr>
                            @endforeach
                            <button type="submit"
                                    class="ui inverted green button">
                                <i class="sync icon"></i>
                            </button>
                            </form>
                            </tbody>
                    </table>
        </div>



    </div>

    <script>
        window.onload = function() {
            $('.menu .item').tab();
        };
    </script>

    <!--inicio do modal para exclusão-->
    <div class="ui basic modal" style="margin-top: 150px !important;">
        <div class="ui icon header">
            <i class="archive icon"></i>
            Deseja mesmo <strong id="action"></strong> o indicador <strong id="nomeUser"> </strong>?

        </div>

        <div class="actions">
            <!--Aqui manda o id do usuário para o controller para ser excluído-->
            <form action="{{route('indicador/destroy')}}" method="POST">
                {!! csrf_field() !!}
                <input class="id" type="hidden"  value="" id="input-target" name="id">
                <div class="ui red basic cancel inverted button">
                    <i class="remove icon"></i>
                    No
                </div>

                <button class="ui green ok inverted button" type="submit">
                    <i class="checkmark icon">

                    </i>
                    Yes
                </button>


            </form>

        </div>
    </div>
    <!--fim do modal para exclusão-->



@stop
