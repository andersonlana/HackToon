@extends('layouts.main')

@section('title',  'Meus Serviços')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4">Meus Serviços</h2>
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Usuario</th>
          <th>Serviço</th>
          <th>Telefone</th>
          <th>Cep</th>
          <th>Endereço</th>
          <th>Número</th>
          <th>Complemento</th>
          <th>Cidade</th>
          <th>Estado</th>
          <th>Preço</th>
          <th>Status</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
      @foreach($servicos as $servico)
        <tr>
          <td>{{$servico->IdServicos}}</td>
          <td>{{$servico->user->name}}</td>
          <td>{{$servico->servico->NomeServico}}</td>
          <td>{{$servico->Telefone}}</td>
          <td>{{$servico->Cep}}</td>
          <td>{{$servico->Endereco}}</td>
          <td>{{$servico->Numero}}</td>
          <td>{{$servico->Complemento}}</td>
          <td>{{$servico->Cidade}}</td>
          <td>{{$servico->Estado}}</td>
          <td>{{$servico->Preco}}</td>
          <td>{{$servico->status->Descricao}}</td>
          <td>
            <a href="#" class="btn btn-primary btn-sm">Excluir</a>
            <!-- <button class="btn btn-danger btn-sm">Excluir</button> -->
          </td>
        </tr>
        @endforeach    
      </tbody>
    </table>
  </div>

@endsection