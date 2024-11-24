@extends('layouts.main')

@section('title',  'Criar Tarefa')

@section('content')

<div id="tarefa-create-container" class="col-md-6 offset-md-3">
   <h2 class="text-center mb-4 titulo-agendamento">Agendamento<span id="profissional-name"></span></h2>
   <form action="/salvar-agendamento" method="POST" >
      @csrf
      <div class="container-agendamento">
         <div class="row">
            <div class="form-group spacing col-6">
               <label for="customer-email" class="mt-2">Cidade</label>
               <input type="text" class="form-control mt-2" id="customer-email" name="customer-email" required>
            </div>
            <div class="form-group spacing col-6">
               <label for="customer-email" class="mt-2">Estado</label>
               <input type="text" class="form-control mt-2" id="customer-email" name="customer-email" required>
            </div>
         </div>
         <div class="form-group spacing">
            <label for="description" class="mt-2">Data e Hora:</label>
            <input type="datetime-local" class="form-control mt-2" name="calendario" >
         </div>
         <div class="form-group spacing">
            <label for="servico" class="mt-2">Profissional:</label>
            <select name="IdProfissional" id="servico" class="form-control mt-2">
               <option value="" disabled selected>Selecione um Profissional</option>
               @foreach($profissionais as $prof)
               <option value="{{ $prof->IdProfissional }}">{{ $prof->Nome }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group spacing input-agendamento">
            <input type="submit" class="btn spacing bt-salvar" value="Salvar">
         </div>
   </form>
   </div>
</div>

@endsection