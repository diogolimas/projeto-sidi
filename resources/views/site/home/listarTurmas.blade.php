@extends('adminlte::page')

@section('title', 'Turmas - SIDI')

@section('content_header')
    <h1>Turmas</h1>
    <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Página Principal</a></li>
            <li><a href="{{route('turmas/listar')}}">Turmas</a></li>
            
    </ol>
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
                        <i class="info circle icon"></i>
                    </th>
                    <th>
                        Editar
                        
                    </th>
                </tr></thead>
                <tbody>
                @foreach($dados as $dado)
                    @if($dado->professor_id == auth()->user()->id)
                        <tr>
                            <td>
                                {{$dado->id}}
                            </td>
                            <td>
                                {{$dado->disciplina}}
                            </td>
                            <td>
                                {{$dado->codigo}}
                            </td>
                            <td>

                                {{$dado->name}}
                            </td>
                            <td>

                                <a class="ui inverted green button"  href="/turmas-listar/alunos/{{$dado->id}}">Ver mais</a>

                            </td>
                            <td>
                                <a href="{{ route('turmas/editar', ['id'=>$dado->id]) }}">
                                    <i class="edit outline icon"></i>
                                </a>


                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            {{ $turmas->links() }}
    </div>
@stop
