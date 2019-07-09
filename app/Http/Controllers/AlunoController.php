<?php

namespace App\Http\Controllers;

use App\Models\Papel;
use App\Models\Permissao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.home.registrarAluno');
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
    public function store(Request $request)
    {
        $papel = Papel::find(auth()->user()->papel_id);
        $permissao = Permissao::find($papel->permissao_id);
        if($permissao->cadastrar_usuario == 1) {
            if ($request->input('name') == null || $request->input('password') == null || $request->input('email') == null)
                return ('Todos os campos são obrigatórios');
            else {
                if ($request->input('password') == $request->input('password_confirmation')) {
                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'periodo' => $request->periodo,
                        'papel_id' => '1',
                        'criador_id' => auth()->user()->id,
                    ]);
                    return view('site.home.index');
                } else
                    return ('Senha Não Coincide');
            }
        }
        else
            return ('Tá querendo dar uma de espertinho?');
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
