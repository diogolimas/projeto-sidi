@extends('adminlte::page')

@section('title', 'Sidi - Registrar usuário')

@section('content_header')
    <h1>Cadastro de usuário</h1>

    <div class="ui small breadcrumb">
        <a class="section" href="{{route('home')}}">Página inicial</a>
        <i class="right chevron icon divider"></i>
        <a class="section">Cadastro de usuários</a>

    </div>
@stop

@section('content')
    <div class="ui container">

        <div class="ui internally celled grid">

            <div class="row">

                <div class="three wide column">

                </div>


                <div class="ten wide column">
                    <div class="d-block mb-4">
                        <h2 class="ui header ">  <a href="{{url('/')}}">
                                <i class="arrow left icon black"></i>
                            </a>
                            {{$titulo_page ?? 'Registrar novo Usuário'}}
                        </h2>
                    </div>
                    @if(isset($success))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <div class="header">{{$success}} </div>
                    </div>
                    @endif
                    <form class="" action="{{ route('efetuarRegistro') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="ui input mb-2 has-feedback {{ $errors->has('name') ? 'has-error' : '' }} d-block ">
                            <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}"
                                   placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            @error('name')
                                 <div class="ui red message">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                   placeholder="{{ trans('adminlte::adminlte.email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                                <div class="ui red message">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="ui input d-block mb-2 has-feedback ">
                            <input id="password" type="password" name="password" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.password') }}" value="{{ old('password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('password')
                                <div class="ui red message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}" value="{{ old('password_confirmation') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @error('password_confirmation')
                                 <div class="ui red message">{{ $message }}</div>
                            @enderror
                        </div>




                        <div class="ui form">
                            <div class="grouped fields">
                                <label>Selecione o tipo de usuário</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input class="ui input" id="cliqueShow" value="1" type="radio" name="papel_id" >
                                        <label for="aluno" >Aluno</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input class="ui input" id="professor" value="2" type="radio" name="papel_id">
                                        <label for="professor">Professor</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input class="ui input" id="administrador" value="3" type="radio" name="papel_id">
                                        <label for="administrador">Adminstrador</label>
                                    </div>
                                </div>
                                @error('papel_id')
                                    <div class="ui red message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>


                        <div id="mostrarPeriodo" class="d-none ui input mb-2">
                            <input  type="text" name="periodo"  class="form-control"
                                   placeholder="Período">

                        </div>

                        <button type="submit"
                                class="ui inverted green button btn-lg btn-block"
                        >Cadastrar</button>

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
