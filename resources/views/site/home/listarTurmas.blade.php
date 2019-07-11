@extends('adminlte::page')

@section('title', 'Sidi - Registrar turma')

@section('content_header')
    <h1>Cadastro de turmas</h1>
@stop

@section('content')
    <div class="ui container">
        @if(isset($success))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header"> {{$success}}</div>
            </div>
        @endif
        @if(isset($error))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header"> {{$error}}</div>
            </div>
        @endif



            <table class="ui celled striped table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th class="collapsing">Nome da disciplina</th>
                    <th>Código</th>
                    <th>Professor</th>
                    <th >
                        +
                    </th>
                    <th >
                        +
                    </th>
                </tr></thead>
                <tbody>
                @foreach($turmas as $turma)
                    <tr>
                        <td>
                            {{$turma->id}}
                        </td>
                        <td>
                            {{$turma->disciplina}}
                        </td>
                        <td>
                            {{$turma->codigo}}
                        </td>
                        <td>
                            {{$turma->professor_id}}
                        </td>
                        <td>
                            <a href="">Ver mais</a>
                            
                        </td>
                        <td>
                            <a href="{{ route('turmas/editar', ['id'=>$turma->id]) }}">Editar</a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $turmas->links() }}









    </div>
@stop
