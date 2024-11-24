@extends('layouts.main')

@section('title',  'Meus Agendamentos')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4">Meus Agendamentos</h2>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Serviço</th>
          <th>Profissional</th>
          <th>Data</th>
          <th>Status</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
      @foreach($agendamentos as $agendamento)
        <tr>
          <td>{{$agendamento->IdAgendamento}}</td>
          <td>{{$agendamento->user->name}}</td>
          <td>{{$agendamento->servico->NomeServico}}</td>
          <td>{{$agendamento->profissional->name}}</td>
          <td>{{ \Carbon\Carbon::parse($agendamento->DataHora)->format('d/m/Y H:i') }}</td>
          <td>{{$agendamento->status->Descricao}}</td>
          <td>
          <form action="/cancelar-agendamento/{{$agendamento->IdAgendamento}}" method="post">
            @csrf
                <input class="btn btn-primary btn-sm" type="submit" value="Cancelar">
            </form>
            <!-- <button class="btn btn-danger btn-sm">Excluir</button> -->
          </td>
        </tr>
        @endforeach    
      </tbody>
    </table>
  </div>

@endsection