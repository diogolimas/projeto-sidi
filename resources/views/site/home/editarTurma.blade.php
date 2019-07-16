@extends('adminlte::page')

@section('title', 'Sidi - Editar turma')

@section('content_header')
    <h1>Editar turmas</h1>
@stop

@section('content')
    <div class="ui container">

        <div class="ui internally celled grid">

            <div class="row">

                    <div class="three wide column">
                            
                    </div>

                    <div class="ten wide column">
                    <div class="d-block mb-4">
                    <h2 class="ui header ">  <a href="{{route('turmas/listar')}}">
                        <i class="arrow left icon black"></i>
                    </a>
                    {{$titulo_page ?? 'Editar turma'}}
                    </h2>
                    </div>
                       
                        <form class="" action="{{ route('turmas/update', ['id'=>$cat->id]) }}" method="post">
                            {!! csrf_field() !!}
                            
                            <div class="ui input mb-2 has-feedback d-block ">
                                <input type="text" name="disciplina" class="form-control" value="{{ $cat->disciplina }}"
                                    placeholder="Digite o nome da disciplina">
                                
                            </div>
                            <div class="ui input d-block mb-2 has-feedback ">
                                <input type="text" name="codigo" class="form-control" value="{{ $cat->codigo }}"
                                    placeholder="Digite o código da turma">
                            </div>
                            <div>
                                <div class="ui form">
                                    <div class="inline field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" tabindex="0" class="hidden">
                                            <label>Checkbox</label>
                                        </div>
                                    </div>
                                </div>
                                <label id="clicarMostrar" title="Clique para mostrar" class="click h3" for="">Listagem de usuários para adicionar </label>
                                <i class="click"  class="fas fa-sort-down"></i>
                                <div id="listagem-usuarios" class="d-none">
                                    @foreach ($usersthis as $users)
                                        @if (in_array($users->id, $alunos))
                                            <input type="checkbox" name="user[]"  value="{{$users->id}}" checked >
                                            <label for="">{{$users->name}}</label> <br>
                                        @else
                                            <input type="checkbox" name="user[]"  value="{{$users->id}}" >
                                            <label for="">{{$users->name}}</label> <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            

                            <button type="submit" class="ui inverted orange button btn-lg btn-block">
                            Editar
                            </button>
                            
                        </form>
                    </div>
                    <!--fim do formulário centralizado-->
                    <div class="three wide column">
                            
                    </div>
                </div>
                <!--fim da row-->
            </div>
            

    </div>
@stop
