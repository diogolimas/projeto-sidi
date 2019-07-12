@extends('adminlte::page')

@section('title',
    $nomeDisciplina.' - Descrição'
)

@section('content_header')
    <h1>Descrição da turma</h1>
    <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Página Principal</a></li>
            <li><a href="{{route('turmas/listar')}}">Turmas</a></li>
            <li><a href="">Descrição</a></li>
    </ol>
@stop

@section('content')
        <div class="ui container">
            <div class="ui segment">
                <h2 class="ui right floated header">
                    @forelse ($classroom as $item)
                        {{$item->disciplina}}
                        -
                        {{$item->codigo}}
                    @empty
                        
                    @endforelse
                </h2>
                    <div class="ui clearing divider"></div>
                <p>
                <strong>
                    @forelse ($professor as $item)
                        {{$item->name}}
                    @empty
                        
                    @endforelse
                </strong> - Professor Principal

                </p>
            </div>
        
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
            @if(isset($students))
                @forelse($students as $aluno)
                    <tr>
                        <td>
                            {{$aluno->id}}
                        </td>
                        <td>
                            {{$aluno->name}}
                        </td>
                        <td>
                            {{$aluno->email}}
                        </td>
                        <td>
                            {{$aluno->periodo}}
                        </td>
                        <td>
                            {{$aluno->quantidade_disciplinas_cursando}}
                        </td>
                    </tr>
                @empty

                @endforelse
            @else
                
            @endif
            </tbody>
        </table>
    </div>
</div>
@stop
