@extends('adminlte::page')

@section('title', 'Sidi - Registrar usuário')

@section('content_header')
    <h1>Cadastro de usuário</h1>
@stop

@section('content')
    <a href="{{route('registrarAluno')}}" class="ui orange button btn-lg btn-line">
        Registrar Aluno
    </a>
    <a href="{{route('registrarProfessor')}}" class="ui orange button btn-lg btn-line">
        Registrar Professor
    </a>
    <a href="{{route('registrarAdmin')}}" class="ui orange button btn-lg btn-line">
        Registrar Administrador
    </a>
@stop