<?php

namespace App\Http\Controllers\Turma;

use Illuminate\Http\Request;
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
    public function create(Request $request, Turma $turmaModel, Aluno_turma $aluno_Turma)
    {
        $dataform = [
            'disciplina'    => $request['disciplina'],
            'codigo'        => $request['codigo'],
            'professor_id'  => auth()->user()->id
        ];


        $insertarTurma = Turma::create($dataform);



        foreach ($request['user'] as $user){
            $insertarAlunoTurma = Aluno_turma::create([
                'id_turma'  => $insertarTurma->id,
                'id_user'   => $user,

            ]);
        }


        if($insertarTurma){
            $success = 'Turma inserida com sucesso';
            $turmas = Turma::where('professor_id', auth()->user()->id)->paginate(6);
            $usersthis = User::where('criador_id', auth()->user()->id)->get();
            return view('site.home.listarTurmas', compact('success', 'usersthis', 'turmas'));
        }else{
            $error = 'Turma não inserida';
            $usersthis = User::where('criador_id', auth()->user()->id)->get();
            return view('site.home.cadastrarTurma', compact('error', 'usersthis'));
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
        $usersthis = User::where('criador_id', auth()->user()->id)->get();
        $turmas = Turma::where('professor_id', auth()->user()->id)->paginate(6);
        return view('site.home.listarTurmas', compact('usersthis', 'turmas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
