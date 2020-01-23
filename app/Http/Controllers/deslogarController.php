<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deslogarController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('id');
        $request->session()->forget('usuario');
        return redirect('/');
    }
}
