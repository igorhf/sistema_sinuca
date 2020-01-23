<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usuariosController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $usuario = $request->usuario;
        $senha = $request->senha;
        $cf_senha = $request->cf_senha;

        $dados = DB::select('select * from usuario where usuario = ?', [$usuario]);
        if (count($dados) == 0 && $senha == $cf_senha) {
            DB::insert('insert into usuario (usuario, senha) values (?, ?)', [$usuario, $senha]);
            $resultado_cadastro = "Cadastro realizado com sucesso";
            $msg = "sucesso";
        } else {
            $resultado_cadastro = "Usuario já existe ou senha invalidar";
            $msg = "erro";
        }

        return view('cadastro', compact('resultado_cadastro', 'msg'));
    }
}
