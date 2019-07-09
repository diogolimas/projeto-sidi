@extends('adminlte::page')

@section('title', 'Sistema Avalitivo de Aprendizagem')

@section('content_header')
    <h1>Listagem De Usuários Que Você Cadastrou</h1>
@stop

@section('content')
    <?php
    use App\User;
    use App\Models\Papel;

    $usuarios = User::all();
    $contador = 0;

    foreach ( $usuarios as $usuario ) {
        if($usuario->criador_id == auth()->user()->id){
            $contador+=1;
            $papel = Papel::find($usuario->papel_id);
            echo "<h2>Usuário $contador</h2>
                <h4>Nome: $usuario->name</h4>
                <h4>Email: $usuario->email</h4>
                <h4>Papel: $papel->nome</h4>";
            if($usuario->papel_id == 1)
                echo "<h4>Período: $usuario->periodo</h4>
                      <h4>Disciplinas cursando: $usuario->quantidade_disciplinas_cursando</h4>";
            if($usuario->papel_id == 2)
                echo "<h4>Disciplinas ministrando: $usuario->quantidade_disciplinas_ministrando</h4>";
            echo "<br>";
        }
    }
    ?>
@stop