<?php

namespace App\Http\Controllers;

use App\Models\Papel;
use App\Models\Permissao;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormUserRequest;
use Illuminate\Support\Facades\DB;

class registroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papel = Papel::find(auth()->user()->papel_id);
        $permissao = Permissao::find($papel->permissao_id);
        if($permissao->cadastrar_usuario == 1)
            return view('site.home.registrar');
        else
            return ('Você não tem acesso à esta página');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormUserRequest $request, User $us)
    {


        $papel = Papel::find(auth()->user()->papel_id);
        $permissao = Permissao::find($papel->permissao_id);
        //verifique o papel
        $usuario = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'papel_id' => $request->papel_id,
            'periodo' => $request->periodo,
            'criador_id' => auth()->user()->id,
        ];

        if($permissao->cadastrar_usuario == 1) {


                $insertar = User::create($usuario);
                if($insertar){
                    $success = "usuário inserido com sucesso!";
                    return redirect()->route('listarUser', ['success' => 'usuário inserido com sucesso!']);
                    /*
                    $usuarios = DB::table('users')->where('papel_id','1')->paginate(2);

                    $dataForm = $request->all();

                    $dados = DB::table('papels')
                        ->join('users', 'users.papel_id', '=', 'papels.id')
                        ->select('*')
                        ->paginate(6);

                    return view('site.home.listar', compact('dados','success','usuarios','dataForm') );
                    */
                }else{
                    return redirect()
                                    ->back();

                }
                
        }
        else{
            return "ERROR 404";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd();
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
    public function excluir($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();

    }
    public function destroy($id)
    {
        //
    }

}
