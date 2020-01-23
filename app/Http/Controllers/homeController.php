<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        $dados = DB::select('select * from apostas order by id desc');
        return view('welcome', compact('dados'));
    }

    public function store(Request $request)
    {
        $jogador_1 = 0;
        $jogador_2 = 0;
        $jogador_3 = 0;
        $jogador_4 = 0;

        $pesquisa = DB::select('select * from apostas where data = ?', [$request->data]);
        foreach ($pesquisa as $key => $value) {
            $jogador_1 += $value->jogador1;
            $jogador_2 += $value->jogador2;
            $jogador_3 += $value->jogador3;
            $jogador_4 += $value->jogador4;
        }
        return view('welcome', compact('pesquisa', 'jogador_1', 'jogador_2', 'jogador_3', 'jogador_4'));
    }
}
