<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index($idServicos) {

        $servicos = Servico::findOrFail($idServicos);

        return view('agendamento', compact('servicos'));

    }
}
