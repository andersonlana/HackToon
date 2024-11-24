<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index() {
        return view('servicos/servicos');
    }

    public function salvar(Request $request) {

    }
}
