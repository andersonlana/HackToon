<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Agendamentos;
use App\Models\User;
use App\Models\Servico;
use App\Models\Status;

class AgendamentosController extends Controller
{
    public function index($id) {
        $usuarios = User::all();
        $servico = Servico::where('IdServicos', $id)->first();

        //echo $servico;
        
        return view('agendamentos/agendamentos', 
        ['usuarios' => $usuarios, 
        'servico' => $servico]);      
    }

    public function meusAgendamentos() {
        $user = auth()->user();

        $agendamentos = Agendamentos::where([
            ['IdCliente', $user->id]
        ])->get();

        foreach ($agendamentos as $agendamento) {
            $agendamento->user = User::where('id', $agendamento->IdCliente)->first();
            $agendamento->servico = Servico::where('IdServicos', $agendamento->IdServico)->first();
            $agendamento->profissional = User::where('id', $agendamento->IdProfissional)->first();
            $agendamento->status = Status::where('IdStatus', $agendamento->IdStatus)->first();
        }

        return view('agendamentos/meus-agendamentos', ['agendamentos' => $agendamentos]);
    }


    public function salvar(Request $request)
    {
        try {
            // Cria uma nova instância de Agendamento
            $Agendamento = new Agendamentos;
    
            // Obtém o usuário autenticado
            $user = auth()->user();
        
            // Atribui os valores ao modelo
            $Agendamento->idCliente = $user->id;
            $Agendamento->IdServico = $request->IdServico; // Ou `$request->IdServico` caso seja dinâmico
            $Agendamento->IdProfissional = $request->IdProfissionais;
            $Agendamento->DataHora = $request->calendario;

            $Agendamento->IdStatus = 2;
    
            // Salva o registro no banco de dados
            $Agendamento->save();    
            // Redireciona para a página inicial com uma mensagem de sucesso
           return redirect('/meus-agendamentos')->with('msg-success', 'Agenda criada com sucesso!');
        } catch (Exception $e) {
            echo $e->getMessage();
 
            // Loga o erro para depuração    
            // Retorna para a página inicial com uma mensagem de erro
           return redirect('/meus-agendamentos')->with('msg-error', 'Erro ao criar Agenda. Favor tentar novamente mais tarde.');
        }
    }

    public function cancelar($id) {

        $agendamento = Agendamentos::findorfail($id);
        $agendamento->IdStatus = 3;
        $agendamento->save();

        return redirect('/meus-agendamentos')->with('msg-error', 'Erro ao criar Agenda. Favor tentar novamente mais tarde.');

    }
}