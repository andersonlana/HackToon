<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;


class HomeController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $servicos = Servico::where([
                ['NomeServico', 'like', '%' .$search. '%']
            ])->get();
        }
        else
        {
            $servicos = Servico::all();
        }

        $servicosSaude = Servico::where([
            ['IdCategoria', 1]
        ])->get();

        $servicosAutomovel = Servico::where([
            ['IdCategoria', 3]
        ])->get();

        $servicosBeleza = Servico::where([
            ['IdCategoria', 4]
        ])->get();

        $servicosCarousel = Servico::where([
            ['IdCategoria', 4]
        ])->get();

        return view('welcome', [
            'servicos' => $servicos,
            'servicosSaude' => $servicosSaude,
            'servicosAutomovel' => $servicosAutomovel,
            'servicosBeleza' => $servicosBeleza,
            'servicosCarousel' => $servicos->sortByDesc('DataCriacao')->take(5),
        ]);  
    }

    public function create() {
        return view('home/create');      
    }
}
