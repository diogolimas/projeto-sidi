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

                                <label id="" title="Clique para mostrar" class="clicarMostrar click h3" for="">Listagem de usuários para adicionar </label>
                                <i class="sort icon clicarMostrar" ></i>
                                <div id="" class="d-none listagem-usuarios">
                                    @if(isset($usersthis, $alunos))

                                    @foreach ($usersthis as $users)
                                        @if (in_array($users->id, $alunos))
                                            <input type="checkbox" name="user[]"  value="{{$users->id}}" checked >
                                            <label for="">{{$users->name}}</label> <br>
                                        @else
                                            <input type="checkbox" name="user[]"  value="{{$users->id}}" >
                                            <label for="">{{$users->name}}</label> <br>
                                        @endif
                                    @endforeach
                                    @else
                                        @foreach($usersthis as $users)
                                            <input type="checkbox" name="user[]"  value="{{$users->id}}" >
                                            <label for="">{{$users->name}}</label> <br>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            

                            <button type="submit" class="ui inverted green button btn-lg btn-block">
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
