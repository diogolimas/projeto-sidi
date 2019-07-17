
@extends('adminlte::page')

@section('title', $titulo_page ?? 'Sidi - Registrar usuário')

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
                            {{$titulo_page ?? 'Registrar novo usuário'}}
                        </h2>
                    </div>
                    @if(isset($success))
                        <div class="ui success message">
                            <i class="close icon"></i>
                            <div class="header">{{$success}} </div>
                        </div>
                    @endif
                    @if(isset($error))
                        <div class="ui success message">
                            <i class="close icon"></i>
                            <div class="header">{{$error}} </div>
                        </div>
                    @endif
                    <form class=""
                          action="<?php if(isset($editar)){ ?>{{route('efetuar-edit')}}<?php }else{?>{{ route('efetuarRegistro') }}<?php } ?>"
                          method="post">
                        {!! csrf_field() !!}
                        @if(isset($editar))
                            <input type="hidden" name="id" value="{{$thisuser->id}}">
                        @else
                        @endif
                        <div class="ui input mb-2 has-feedback {{ $errors->has('name') ? 'has-error' : '' }} d-block ">
                            <input id="name" type="text" name="name" class="form-control" value="{{ $thisuser->name ?? old('name') }} "
                                   placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                            <i class="glyphicon glyphicon-user form-control-feedback"></i>
                            @error('name')
                            <div class="ui red message">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="ui input d-block mb-2 has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <input type="email" name="email" class="form-control" value="{{  $thisuser->email ?? old('email') }}"
                                   placeholder="{{ trans('adminlte::adminlte.email') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @error('email')
                            <div class="ui red message">{{ $message }}</div>
                            @enderror

                        </div>
                        @if(isset($editar))
                        @else
                            <div class="ui input d-block mb-2 has-feedback ">
                                <input id="password" type="password" name="password" class="form-control"
                                       placeholder="{{ trans('adminlte::adminlte.password') }}" value="{{old('password') }}">
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

                        @endif



                        <div class="ui form">
                            <div class="grouped fields">
                                <label>Selecione o tipo de usuário</label>
                                <div class="field">
                                    <div class="ui radio checkbox">

                                        <input class="ui input cliqueShow" id="cliqueShow" value="1" type="radio" name="papel_id"
                                        <?php if(isset($thisuser->papel_id)){
                                            if($thisuser->papel_id=='1')
                                                echo 'checked';
                                        } ?>>
                                        <label for="aluno" class="cliqueShow">Aluno</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input class="ui input professor" id="professor" value="2" type="radio" name="papel_id"
                                        <?php if(isset($thisuser->papel_id)){
                                            if($thisuser->papel_id=='2')
                                                echo 'checked';
                                        } ?>
                                        >
                                        <label for="professor" class="professor">Professor</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input class="ui input administrador" id="administrador" value="3" type="radio" name="papel_id"
                                        <?php if(isset($thisuser->papel_id)){
                                            if($thisuser->papel_id=='3')
                                                echo 'checked';
                                        } ?>
                                        >
                                        <label for="administrador" class="administrador">Adminstrador</label>
                                    </div>
                                </div>
                                @error('papel_id')
                                <div class="ui red message">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>


                        <div  class="mostrarPeriodo ui input mb-2 d-block">
                            <input  type="text" name="periodo"  class="mostrarPeriodo form-control"
                                    placeholder="Período" value="{{$thisuser->periodo}}">

                        </div>
                        <button type="submit"
                                class="ui inverted green button btn-lg btn-block"
                        >
                            <?php if(isset($editar)){ ?>
                            Editar
                            <?php }else{?>
                            Cadastrar
                            <?php }?></button>

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
