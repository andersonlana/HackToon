<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ServicoController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/create', [HomeController::class, 'create']);
Route::get('/agendamento/{id}', [AgendamentosController::class, 'index']);
Route::get('/meus-agendamentos', [AgendamentosController::class, 'meusAgendamentos']);
Route::get("/servico", [ServicoController::class, 'index']);
Route::get('/meus-servicos', [ServicoController::class, 'meusServicos']);
Route::post("/salvar-servico", [ServicoController::class, 'salvar']);
Route::get('/usuarios-por-estado/{es}', [EstadoController::class, 'getUsuariosPorEstado']);
Route::post('/salvar-agendamento', action: [AgendamentosController::class, 'salvar']);
Route::post('/cancelar-agendamento/{id}', action: [AgendamentosController::class, 'cancelar']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //return view('dashboard');
        return redirect('/');
    })->name('dashboard');
});
