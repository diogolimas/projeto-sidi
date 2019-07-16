<?php

namespace App\Http\Controllers\Turma;

use App\Http\Requests\FormCadastroTurmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Papel;
use App\Models\Aluno_turma;

use App\Models\Turma;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $usersthis = User::where('criador_id', auth()->user()->id)->get();

        return view('site.home.cadastrarTurma', compact('usersthis'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormCadastroTurmas $request, Turma $turmaModel, Aluno_turma $aluno_Turma)
    {
        //array para o cadastro das disciplinas
        $dataform = [
            'disciplina'    => $request['disciplina'],
            'codigo'        => $request['codigo'],
            'professor_id'  => auth()->user()->id
        ];


        $insertarTurma = Turma::create($dataform);


        if(isset($request['user'])){
            foreach ($request['user'] as $user){
                $usuario = User::find($user);
                $usuario->quantidade_disciplinas_cursando += 1;
                $usuario->save();

                $insertarAlunoTurma = Aluno_turma::create([
                    'id_turma'  => $insertarTurma->id,
                    'id_user'   => $user
                ]);
            }
        }

        if($insertarTurma){
            $success = 'Turma inserida com sucesso';
            $turmas = Turma::where('professor_id', auth()->user()->id)->paginate(6);
            $dados = DB::table('users')
                ->join('turmas', 'turmas.professor_id', '=', 'users.id')
                ->select('*')
                ->get();

            return view('site.home.listarTurmas', compact('success', 'dados', 'turmas'));
        }else{
            $error = 'Turma não inserida';
            $dados = DB::table('users')
                ->join('turmas', 'turmas.professor_id', '=', 'users.id')
                ->select('*')
                ->get();
            return view('site.home.cadastrarTurma', compact('error', 'dados'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $turmas = Turma::where('professor_id', auth()->user()->id)->paginate(6); //Paginção
        $dados = DB::table('users')
            ->join('turmas', 'turmas.professor_id', '=', 'users.id')
            ->select('*')
            ->get();

        return view('site.home.listarTurmas', compact('dados', 'turmas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Turma::find($id);
        //'<pre>' . var_dump($cat) . '</pre>';

        $dados = DB::table('users')
            ->join('aluno_turmas', 'aluno_turmas.id_user', '=', 'users.id')
            ->select('*')
            ->get();

        $contador = 0;
        foreach ($dados as $dado){
            if($dado->id_turma == $id) {
                $alunos[$contador] = $dado->id_user;
                $contador += 1;
            }
        }

        $usersthis = User::where('criador_id', auth()->user()->id)->get();

        if(isset($cat)) {
            return view('site.home.editarTurma', compact('cat', 'usersthis', 'alunos'));
        }
        echo "Essa turma não existe";

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormCadastroTurmas $request, $id)
    {
        $turmas = Aluno_turma::where('id_turma', $id)->get();
        foreach ($turmas as $turma) {
            $usuario = User::find($turma->id_user);
            $usuario->quantidade_disciplinas_cursando -= 1;
            $usuario->save();
            $turma->delete();
        }
        $cat = Turma::find($id);
       
        if(isset($cat)) {
            $cat->disciplina = $request->input('disciplina');
            $cat->codigo = $request->input('codigo');
            $cat->save();
        }

        if(isset($request['user'])){
            foreach ($request['user'] as $user){
                $usuario = User::find($user);
                $usuario->quantidade_disciplinas_cursando += 1;
                $usuario->save();

                $insertarAlunoTurma = Aluno_turma::create([
                    'id_turma'  => $id,
                    'id_user'   => $user
                ]);
            }
        }

        return redirect ('/turmas-listar');
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function alunos($id, Turma $turma)
    {
        
        $id_alunos = Aluno_turma::where('id_turma', $id)->get();
        $classroom = Turma::where('id', $id)->get();
        foreach ($classroom as $value) {
            $professor = User::where('id', $value->professor_id)->get();
            $nomeDisciplina = $value->disciplina;
            
        }
        $alunos = User::all();


            foreach ($id_alunos as $id_aluno){
                foreach ($alunos as $aluno){
                    if($aluno->id == $id_aluno->id_user){
                        $usuarios[] = User::find($aluno->id);
                    }
                }
            }

        if(isset($usuarios)){
            return view('site.home.listar-turma-alunos', compact('usuarios','classroom', 'professor','nomeDisciplina', 'id'));
        }else{
            return view('site.home.listar-turma-alunos', compact('classroom', 'professor','nomeDisciplina', 'id'));
        }
    }
}
