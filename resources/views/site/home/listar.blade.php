@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Listagem de usuários</h1>
    <div class="ui small breadcrumb">
        <a class="section" href="{{route('home')}}">Página inicial</a>
        <i class="right chevron icon divider"></i>
        <a class="section">Listagem de usuários</a>
    </div>
    
@stop

@section('content')

    @if(isset($success))
        <div class="ui success message">
            <i class="close icon"></i>
            <div class="header">{{$success}} </div>
        </div>
    @endif

    @if(isset($error))
        <div class="ui danger message">
            <i class="close icon"></i>
            <div class="header">{{$error}} </div>
        </div>
    @endif



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

                            <a data-id="{{$dado->id}}" data-name="{{$dado->name}}" data-action="editar"
                                    class="ui inverted yellow button" href="{{url('/usuario-editar',[$dado->id])}}">
                                <i class="edit icon black"></i>
                            </a>
                            <a href="{{route('editar-usuario',  [$dado->id])}}"><i class=""></i></a>
                            <button data-id="{{$dado->id}}" data-name="{{$dado->name}}" data-action="excluir" class="excluir ui inverted red button">
                                <i class="trash alternate outline icon"></i>
                            </button>
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

        <!--inicio do modal para exclusão-->
        <div class="ui basic modal" style="margin-top: 150px !important;">
            <div class="ui icon header">
                <i class="archive icon"></i>
                Deseja mesmo <strong id="action"></strong> o usuário <strong id="nomeUser"> </strong>?

            </div>

                <div class="actions">
                    <!--Aqui manda o id do usuário para o controller para ser excluído-->
                    <form action="{{route('excluir-usuario')}}" method="POST">
                        {!! csrf_field() !!}
                        <input class="id" type="hidden"  value="" id="input-target" name="id">
                        <div class="ui red basic cancel inverted button">
                            <i class="remove icon"></i>
                            No
                        </div>

                            <button class="ui green ok inverted button" type="  submit">
                                <i class="checkmark icon">

                                </i>
                                Yes
                            </button>


                    </form>

                    </div>
                </div>
    <!--fim do modal para exclusão-->







@stop
