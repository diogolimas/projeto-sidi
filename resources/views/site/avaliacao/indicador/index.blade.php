@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Indicadores da avaliação: <b>{{$atividade->nome}}</b></h1>
@stop

@section('content')




    @if(isset($success))
        <div class="ui success message">
            <i class="close icon"></i>
            <div class="header">{{$success}} </div>
        </div>
    @endif

        <table class="ui celled striped table">
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
@stop
