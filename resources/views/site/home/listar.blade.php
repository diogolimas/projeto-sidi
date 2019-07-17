@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Listagem de usuários</h1>
    <ol class="breadcrumb">
            <li><a href="{{route('home')}}">Página Principal</a></li>
            <li><a href="{{route('listarUser')}}">Usuários</a></li>
            
    </ol>
    
@stop

@section('content')

    @if(isset($success))
        <div class="ui success message">
            <i class="close icon"></i>
            <div class="header">{{$success}} </div>
        </div>
    @endif
       <?php
           $usu = '';
       ?>



        <table class="ui celled striped table">
            <thead>
            <tr>
                <th>
                    Id
                </th>
                <th class="collapsing">
                    Nome do aluno
                </th>
                <th>
                    Email
                </th>
                <th>
                    Papel
                </th>
                <th>
                    Período
                </th>
                <th>
                    Disciplina cursando
                </th>
                <th>
                    Ações
                </th>
            </tr></thead>
            <tbody>
            @foreach($usuarios as $dado)

                @if($dado->criador_id == auth()->user()->id)
                    <tr>
                        <td>{{$dado->id}}</td>
                        <td>{{$dado->name}}</td>

                        <td>{{$dado->email}}</td>
                        <td>{{$dado->nome}}</td>

                        <td>{{$dado->periodo}}</td>
                        <td>{{$dado->quantidade_disciplinas_cursando}}</td>
                        <td>
                            <a href="{{route('exluir-usuario',[$dado->id])}}">
                                <i class="trash alternate outline icon"></i>
                            </a>
                            <a href="{{route('editar-usuario',  [$dado->id])}}"><i class="edit icon"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        @if(isset($dataForm))
            {{$usuarios->appends($dataForm)->links()}}
        @else
            {{$usuarios->links()}}
        @endif






@stop
