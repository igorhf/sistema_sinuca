<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $usuario = $request->usuario;
        $senha = $request->senha;

        $dados = DB::select('select * from usuario where usuario = ? and senha = ?', [$usuario, $senha]);
        if (count($dados) != 0) {
            foreach ($dados as $value) {
                $request->session()->put('id', $value->id);
                $request->session()->put('usuario', $value->usuario);
            }
            return redirect('/');
        } else {
            $resultado_login = "usuario ou senha invalida";
        }
        return view('login', compact('resultado_login'));
    }
}
