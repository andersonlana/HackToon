<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicosProfissionais;
use App\Models\User;
use App\Models\Servico;
use App\Models\Status;

class ServicoController extends Controller
{
    public function index() {
        return view('servicos/servicos');
    }

    public function meusServicos() {
        $user = auth()->user();

        $servicos = ServicosProfissionais::where([
            ['IdUser', $user->id]
        ])->get();

        foreach ($servicos as $servico) {
            $servico->user = User::where('id', $servico->IdUser)->first();
            $servico->servico = Servico::where('IdServicos', $servico->IdServicos)->first();
            $servico->status = Status::where('IdStatus', $servico->IdStatus)->first();
        }

        return view('servicos/meus-servicos', ['servicos' => $servicos]);
    }

    public function salvar(Request $request) {

    }
}
