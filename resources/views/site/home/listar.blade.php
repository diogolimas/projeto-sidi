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



        <table class="ui celled striped table">
            <thead>
            <tr>
                <th>Id</th>
                <th class="collapsing">Nome do aluno</th>
                <th>Email</th>
                <th>Papel</th>
                <th>Período</th>
                <th >
                    Disciplina cursando
                </th>
            </tr></thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->papel_id}}</td>
                    <td>{{$usuario->periodo}}</td>
                    <td>{{$usuario->quantidade_disciplinas_cursando}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$usuarios->links()}}

        






@stop
