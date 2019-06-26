@extends('user.templates.template')

@section('content')

    <div class="ui container">

        <h1>
            <a href="{{url('/   ')}}">
                <i class="arrow left icon black"></i>
            </a>
            {{$titulo_page ?? 'Cadastrar de usuário'}}
        </h1>
        <form class="ui form" method="POST" action="{{ route('register') }}">
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome:">
            </div>
            <div class="field">
                <label>Email</label>
                <input type="text" name="cpf" placeholder="Email">
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
                <label>Papel:</label>
                <select class="ui fluid dropdown" name="nome_papel">
                    <option value=""> - Selecione o papel do usuário - </option>
                    <option value="professor"> Professor </option>
                    <option value="aluno"> Aluno </option>
                    <option value="Administrador">Administrador</option>
                </select>
            </div>
            <div class="field">
                <label>Descrição do papel:</label>
                <textarea rows="2" name="descricao_papel"></textarea>
            </div>
            <div class="field">
            <h3 class="block">Permissões</h3>
                <input class="inline" type="checkbox" name="cadastrar_usuario" id="cad"><label for="cad" class="inline">Cadastro de usuários</label>
                <input type="checkbox" name="edit_delete_usuario" id=""><label for="cad" class="inline">Ediçao e deleção de usuários</label>
                <input type="checkbox" name="cadastrar_avaliacao" id=""><label for="cad" class="inline">Cadastro de avaliações</label>
                <input type="checkbox" name="edit_delete_avaliacao" id=""><label for="cad" class="inline">Edição e deleção de avaliações</label>
            </div>



            <button class="ui teal button" type="submit">{{$action_buttons ?? 'Cadastrar'}}</button>
        </form>
    </div>
@endsection

