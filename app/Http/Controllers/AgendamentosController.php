<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Agendamentos;
use App\Models\User;

class AgendamentosController extends Controller
{
    public function index() {
        $usuarios = User::all();
        return view('agendamentos/agendamentos', ['usuarios' => $usuarios]);      
    }

    public function salvar(Request $request)
    {
        try {
            // Cria uma nova instância de Agendamento
            $Agendamento = new Agendamentos;
    
            // Obtém o usuário autenticado
            $user = auth()->user();
        
            // Atribui os valores ao modelo
            $Agendamento->IdCliente = $user->id;
            $Agendamento->IdServico = $request->IdServico; // Ou `$request->IdServico` caso seja dinâmico
            $Agendamento->IdProfissional = $request->IdProfissional;
            $Agendamento->DataHora = $request->calendario;
            $Agendamento->IdStatus = 2;
    
            // Salva o registro no banco de dados
            $Agendamento->save();    
            // Redireciona para a página inicial com uma mensagem de sucesso
           return redirect('/')->with('msg-success', 'Agenda criada com sucesso!');
        } catch (Exception $e) {
            echo $e->getMessage();
 
            // Loga o erro para depuração    
            // Retorna para a página inicial com uma mensagem de erro
            return redirect('/')->with('msg-error', 'Erro ao criar Agenda. Favor tentar novamente mais tarde.');
        }
    }
}