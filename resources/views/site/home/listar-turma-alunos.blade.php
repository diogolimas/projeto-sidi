@extends('adminlte::page')

@section('title', 'Sidi - Registrar turma')

@section('content_header')
    <h1>Cadastro de turmas</h1>
@stop

@section('content')
        <table class="ui celled striped table">
            <thead>
            <tr>
                <th>Id</th>
                <th class="collapsing">Nome</th>
                <th>Email</th>
                <th>Período</th>
                <th>Disciplinas cursando</th>
            </tr></thead>
            <tbody>
            @if(isset($usuarios))
            @foreach($usuarios as $usuario)
                <tr>
                    <td>
                        {{$usuario->id}}
                    </td>
                    <td>
                        {{$usuario->name}}
                    </td>
                    <td>
                        {{$usuario->email}}
                    </td>
                    <td>
                        {{$usuario->periodo}}
                    </td>
                    <td>
                        {{$usuario->quantidade_disciplinas_cursando}}
                    </td>
                </tr>
            @endforeach
            @else
                
            @endif
            </tbody>
        </table>
    </div>
@stop
