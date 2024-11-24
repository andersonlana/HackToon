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

        $servicos = Servico::all()->sortBy('NomeServico');

        return view('servicos/servicos', ['servicos' => $servicos]);
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

    function limparCep($cep)
    {
            // Remove qualquer caractere que não seja número
       return preg_replace('/[^0-9]/', '', $cep);
    }

    public function salvar(Request $request) {

        try {
            $ServicoProfissionais = new  servicosprofissionais();

            $user = auth()->user();
            
            $ServicoProfissionais->IdUser = $user->id;
            $ServicoProfissionais->IdServicos = $request->servico; // Campo `name="servico"`
            $ServicoProfissionais->Telefone = preg_replace('/\D/', '', $request->telefone); // Remove tudo que não for número
            $ServicoProfissionais->Cep = $this->limparCep($request->cep);
            $ServicoProfissionais->Endereco = $request->rua; // Campo `name="rua"`
            $ServicoProfissionais->Numero = $request->numero; // Campo `name="numero"`
            $ServicoProfissionais->Complemento = $request->complemento; // Campo `name="complemento"`
            $ServicoProfissionais->Cidade = $request->cidade; // Campo `name="cidade"`
            $ServicoProfissionais->Estado = $request->estado; // Campo `name="estado"`
            $ServicoProfissionais->Preco = $request->preco; // Campo `name="preco"`
            $ServicoProfissionais->IdStatus = 1;
    
            // Salva o registro no banco de dados
            $ServicoProfissionais->save();    
    
            return redirect('/meus-servicos')->with('msg-error', 'Erro ao criar Agenda. Favor tentar novamente mais tarde.');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
