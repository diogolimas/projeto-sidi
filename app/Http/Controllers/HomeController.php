<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;
use App\Models\Papel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('site.home.index');
    }

    public function registro()
    {
        $papel = Papel::find(auth()->user()->papel_id);
        $permissao = Permissao::find($papel->permissao_id);
        if($permissao->cadastrar_usuario == 1)
            return view('site.home.registrar');
        else
            return ('Você não tem acesso à esta página');
    }

    public function listarUsuario()
    {
        return view('site.home.listar');
    }
}
