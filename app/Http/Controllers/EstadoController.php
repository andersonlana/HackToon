<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Agendamentos;
use App\Models\Usuarios;

class EstadoController extends Controller
{
    public function getUsuariosPorEstado($request) {


        $buscar = new Usuarios();        
        $usuarios = $buscar->buscarUsuariosPorEstado($request);

        // Exemplo de retorno em JSON para teste
        return response()->json($usuarios)
        ->header('Content-Type', 'application/json')
        ->header('X-API-Version', '1.0');        // return view('agendamentos/agendamentos', ['usuarios' => $usuarios]);      
    }


   
}