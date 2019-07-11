@extends('adminlte::page')

@section('title', 'Sidi - Registrar usuário')

@section('content_header')
    <h1>Cadastro de usuário</h1>
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
                            {{$titulo_page ?? 'Registrar Novo Usuário'}}
                        </h2>
                    </div>
                    <form class="" action="{{ route('efetuarRegistro') }}" method="post">
                        {!! csrf_field() !!}

                        <div class="ui input mb-2 has-feedback {{ $errors->has('name') ? 'has-error' : '' }} d-block ">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                   placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                   placeholder="{{ trans('adminlte::adminlte.email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.password') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <select name="papel" class="ui selection dropdown">
                            <option value="1">Aluno</option>
                            <option value="2">Professor</option>
                            <option value="3">Administrador</option>
                        </select>
                        <div class="ui input mb-2 has-feedback d-block ">
                            <input type="text" name="periodo" class="form-control" value="{{ old('periodo') }}"
                                   placeholder="Período">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <button type="submit"
                                class="ui inverted orange button btn-lg btn-block"
                        >{{ trans('adminlte::adminlte.register') }}</button>

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