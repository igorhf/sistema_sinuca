<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vencedorController extends Controller
{
    public function index()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $time = isset($_GET['time']) ? $_GET['time'] : 0;

        if ($time == 1) {
            DB::update('update apostas set jogador1 = 1,is_vitoria = 1 where id = ?', [$id]);
        }
        if ($time == 2) {
            DB::update('update apostas set jogador2 = 1,is_vitoria = 1 where id = ?', [$id]);
        }
        if ($time == 3) {
            DB::update('update apostas set jogador1 = 1, jogador2 = 1, is_vitoria = 1 where id = ?', [$id]);
        }
        if ($time == 4) {
            DB::update('update apostas set jogador3 = 1, jogador4 = 1, is_vitoria = 1 where id = ?', [$id]);
        }

        return redirect('/');
    }
}
