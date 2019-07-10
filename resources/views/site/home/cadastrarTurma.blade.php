@extends('adminlte::page')

@section('title', 'Sidi - Registrar turma')

@section('content_header')
    <h1>Cadastro de turmas</h1>
@stop

@section('content')
    <div class="ui container">

        <div class="ui internally celled grid">

            <div class="row">

                    <div class="three wide column">
                            
                    </div>

                    <div class="ten wide column">
                    <div class="d-block mb-4">
                    <h2 class="ui header ">  <a href="{{url('/registrar')}}">
                        <i class="arrow left icon black"></i>
                    </a>
                    {{$titulo_page ?? 'Registrar nova turma'}}
                    </h2>
                    </div>
                        <form class="" action="{{ route('turmas/registrar') }}" method="post">
                            {!! csrf_field() !!}
                            
                            <div class="ui input mb-2 has-feedback d-block ">
                                <input type="text" name="disciplina" class="form-control" value=""
                                    placeholder="Digite o nome da disciplina">
                                
                            </div>
                            <div class="ui input d-block mb-2 has-feedback ">
                                <input type="email" name="código" class="form-control" value="{{ old('email') }}"
                                    placeholder="Digite o código da turma">
                            </div>
                            <div>

                                <label class="click" for="">Listagem de usuários para adicionar </label>
                                <i class="fas fa-sort-down"></i>
                                <div id="listagem-usuarios">
                                    @foreach ($usersthis as $users)
                                        <input type="checkbox" name="user" id="us" value="{{$users->id}}" >
                                            <label for="us">{{$users->name}}</label> 
                                    @endforeach
                                </div>
                            </div>
                            <script>
                            $(function(){
                                $('#listagem-usuarios').hide();
                            });
                            </script>
                            <button type="submit" class="ui inverted orange button btn-lg btn-block">
                            Cadastrar
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