@extends('adminlte::page')


@section('content_header')
    <h1>Cadastrar nova indicador para a avaliação {{$atividade->nome}}</h1>
    <ol class="breadcrumb">
        {{--Coloca coisa aqui--}}
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
                            Cadastrar novo indicador
                        </h2>
                    </div>

                    <form action="{{ route('indicador/efetuar', ['avaliacao' => $atividade->id]) }}" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $turma->id }}">
                        <div class="form-group">
                            <textarea class="form-control" name="descricao_indicador" placeholder="Descricao do indicador" required></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nota_maxima" placeholder="Nota máxima" required>
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-warning" type="submit">Cadastrar indicador</button>
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
