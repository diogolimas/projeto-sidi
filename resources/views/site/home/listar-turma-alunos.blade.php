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
                <th >
                    +
                </th>
            </tr></thead>
            <tbody>
            @foreach($alunos as $aluno)
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
                        <a href="/turmas-listar/alunos/{{$turma->id}}">Ver mais</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $turmas->links() }}
    </div>
@stop
