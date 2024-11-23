@extends('layouts.main')

@section('title',  'Criar Tarefa')

@section('content')


<div id="tarefa-create-container" class="col-md-6 offset-md-3">
    <h1 class="text-center mb-4">Cadastro de Tarefa</h1>
    <form action="/salvar-agendamento" method="POST" >
        @csrf
        
        </div>

        <div class="form-group spacing">
            <label for="description">Calendario:</label>
            <input type="hidden" name="IdServico" value="{{$IdServico}}"  >
        </div>
        <div class="form-group spacing">
            <label for="description">Calendario:</label>
            <input type="datetime-local" name="calendario" >
        </div>

        <div class="form-group spacing">
    <label for="servico">Serviço:</label>
    <select name="IdProfissional" id="servico" class="form-control">
        <option value="" disabled selected>Selecione um serviço</option>
        @foreach($profissionais as $prof)
            <option value="{{ $prof->IdProfissional }}">{{ $prof->Nome }}</option>
        @endforeach
    </select>
</div>

    

        <div class="form-group spacing">
            <input type="submit" class="btn btn-primary spacing bt-salvar" value="Salvar">
        </div>

    </form>
</div>

@endsection