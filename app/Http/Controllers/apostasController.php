<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apostasController extends Controller
{
    public function index()
    {
        return view('aposta');
    }

    public function store(Request $request)
    {
        $typegame = $request->typegame;
        $valor = $request->valor;
        $data = $request->data;

        if (!empty($valor) && !empty($data)) {
            DB::insert('insert into apostas (jogador1,jogador2,jogador3,jogador4,is_vitoria,partida,valor,data) values (?,?,?,?,?,?,?,?)', ['0', '0', '0', '0', '0', $typegame, $valor, $data]);
            $resultado_cadastro = "Cadastro realizado com sucesso";
            $msg = "sucesso";
        } else {
            $resultado_cadastro = "Todos os campos deve ser preenchido";
            $msg = "erro";
        }
        return view('aposta', compact('resultado_cadastro', 'msg'));
    }
}
