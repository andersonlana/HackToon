@extends('layouts.main')

@section('title',  'Criar Serviço')

@section('content')

<div class="col-md-6 offset-md-3">
   <h2 class="text-center mb-4">Cadastre seu Serviço</h2>
   <form action="/salvar-servico" method="POST" >
      @csrf      
      <label for="servico">Selecione tipo de serviço</label>
      <select class="form-select form-control" name="servico">
         <option value="" disabled selected>Selecione uma opção</option>

         @foreach($servicos as $servico)
            <option value="{{$servico->IdServicos}}">{{$servico->NomeServico}}</option>
         @endforeach 
      </select>

      <div class="form-group input-cadastro mx-auto">
         <label class="label-cadastro" for="telefone">Telefone</label>
         <input type="text" class="form-control apenasNumero mascara-telefone" name="telefone"
         minlenght="10" maxlenght="11">
      </div>

      <div>
         <label for="cep" class="label-cadastro">Cep</label>
         <input type="text" class="form-control apenasNumero" name="cep" id="cep" minlenght="8"
         maxlenght="8">
      </div>

      <div class="row">
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <label class="label-cadastro" class="teste" for="rua">Rua</label>
            <input type="text" name="rua" class="form-control">
         </div>
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="label-cadastro" class="tesidentificacaoCamposte" for="numero">Número</label>
            <input type="text" name="numero" class="form-control" maxlenght="10">
         </div>
      </div>
   <div class="form-group mb-3">
      <label class="label-cadastro" for="bairro">Bairro</label>
      <input type="text" class="form-control" name="bairro">
   </div>
   <div class="form-group mb-3">
      <div class="row">
         <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <label class="label-cadastro" for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade">
         </div>
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label class="label-cadastro" for="estado">Estado</label>
            <input type="text" class="form-control" name="estado">
         </div>
      </div>
   </div>
   <div class="form-group mb-3">
      <label class="label-cadastro" for="complemento">Complemento</label>
      <input type="text" class="form-control" name="complemento" maxlenght="50">
   </div>
   <div class="form-group mb-3">
      <label class="label-cadastro" for="preco">Preço</label>
      <input type="text" class="form-control" name="preco">
   </div>

   <div class="form-group spacing input-agendamento">
      <input type="submit" class="btn spacing btn-primary bt-salvar" value="Salvar">
   </div>
</div>
   </form>
</div>

   <script src="{{ asset('js/script.js') }}"></script>
@endsection