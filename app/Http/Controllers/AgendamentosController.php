<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Agendamentos;
use App\Models\User;
use App\Models\Servico;
use App\Models\Status;
use App\Models\ServicosProfissionais;
use App\Models\Usuarios;

class AgendamentosController extends Controller
{
    public function index($id) {
        $usuarios = User::all();
        $servico = Servico::where('IdServicos', $id)->first();

        foreach ($usuarios as $usuario) {
            $usuario->servicoProfissional = ServicosProfissionais::where('IdUser', $usuario->id)
            ->where('IdServicos', 20)->first();
        }

        $usuariosComServicos = $usuarios->filter(function ($usuario) use ($id) {
            $usuario->servicoProfissional = ServicosProfissionais::where('IdUser', $usuario->id)
                ->where('IdServicos', $id)
                ->first();
    
            // Retorna apenas usuários que possuem um servicoProfissional
            return $usuario->servicoProfissional !== null;
        });
        
        return view('agendamentos/agendamentos', 
        ['usuarios' => $usuariosComServicos, 
        'servico' => $servico]);      
    }

    public function meusAgendamentos() {
        $user = auth()->user();

        $agendamentos = Agendamentos::where('IdCliente', $user->id)
        ->orWhere('IdProfissional', $user->id)
        ->get();

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
        }
    }

    public function cancelar($id) {

        $Cancelar = new Usuarios();
        $Cancelar->CacelarAgendamento($id);
    
        return redirect('/meus-agendamentos')->with('msg-error', 'Erro ao criar Agenda. Favor tentar novamente mais tarde.');
    }
}