@extends('user.templates.template')

@section('content')

    <div class="ui container">

        <h1>
            <a href="{{url('/   ')}}">
                <i class="arrow left icon black"></i>
            </a>
            Cadastrar usuário
        </h1>
        <form class="ui form" method="put" action="{{''}}">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome:">
            </div>
            <div class="field">
                <label>CPF</label>
                <input type="text" name="cpf" placeholder="cpf">
            </div>
            <div class="field">
                <label>Login</label>
                <input type="text" name="login" placeholder="Login">
            </div>
            <div class="field">
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Senha">
            </div>
            <div class="field">
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Senha">
            </div>

            <div class="field">
                <label>Papel:</label>
                <input type="text" name="papel" placeholder="Papel">
            </div>
            <div class="field">
                <label>Descrição do papel:</label>
                <textarea rows="2" name="descricao"></textarea>
            </div>
            <div class="field">
                <label>Tipo de permissão:</label>
                <select class="ui fluid dropdown">
                    <option value=""> - Selecione a permissão - </option>
                    <option value="1"> Professor </option>
                    <option value="2"> Aluno </option>
                </select>
            </div>


            <button class="ui button" type="submit">Submit</button>
        </form>
    </div>
@endsection

