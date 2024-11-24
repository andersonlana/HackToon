@extends('layouts.main')

@section('title',  'HackToon')

@section('content')

<div id="carouselServicos" class="carousel slide small-carousel" data-ride="carousel" style="max-width: 600px; margin: auto;">
  <div class="carousel-inner">
    @foreach($servicosCarousel as $servico)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <a href="/agendamento/{{$servico->IdServicos}}">
          <img class="d-block w-100" src="{{ $servico->Imagem }}" alt="{{ $servico->NomeServico }}">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{ $servico->NomeServico }}</h5>
            <p>{{ $servico->Descricao }}</p>
          </div>
        </a>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselServicos" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselServicos" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="content">
  <h2 class="text-center my-4">Encontre os melhores serviços, feitos especialmente para você!</h2>

  <div class="row justify-content-center mb-4">
    <!-- Categoria Saúde -->
    <div class="dropdown col-12 col-md-4 text-center mb-3">
      <h4 class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-hospital me-2 text-white"></i>Saúde
      </h4>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach($servicosSaude as $saude)
          <a class="dropdown-item" href="/agendamento/{{$saude->IdServicos}}">{{$saude->NomeServico}}</a>
        @endforeach
      </div>
    </div>

    <!-- Categoria Automóvel -->
    <div class="dropdown col-12 col-md-4 text-center mb-3">
      <h4 class="nav-link dropdown-toggle" href="#" id="dropdownAutomovel" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-tools me-2 text-black"></i>Automóvel
      </h4>
      <div class="dropdown-menu" aria-labelledby="dropdownAutomovel">
      @foreach($servicosAutomovel as $automovel)
          <a class="dropdown-item" href="/agendamento/{{$automovel->IdServicos}}">{{$automovel->NomeServico}}</a>
        @endforeach
      </div>
    </div>

    <!-- Categoria Beleza -->
    <div class="dropdown col-12 col-md-4 text-center mb-3">
      <h4 class="nav-link dropdown-toggle" href="#" id="dropdownBeleza" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-scissors me-2 text-black"></i>Beleza
      </h4>
      <div class="dropdown-menu" aria-labelledby="dropdownBeleza">
      @foreach($servicosBeleza as $beleza)
          <a class="dropdown-item" href="/agendamento/{{$beleza->IdServicos}}">{{$beleza->NomeServico}}</a>
        @endforeach
      </div>
    </div>
  </div>

  <form action="/" method="GET">
    <div class="filtro-container text-center mb-4">
      <div class="input-group justify-content-center">
        <input type="text" id="pesquisa-servico" name="search" class="form-control" placeholder="Pesquisar serviço..." aria-label="Pesquisar serviço...">
        <button class="btn btn-success" type="submit">
          <i class="bi bi-search"></i> 
        </button>
      </div>
    </div>
  </form>
</div>



<div class="blog text-center my-5">  <h2>Serviços</h2>
  <div class="row">
    @foreach($servicos as $servico)
      <div class="col-md-4">
        <div class="card">
          <img src="{{$servico->Imagem}}" class="card-img" alt="Dica 1">
          <div class="card-body">
            <h5 class="card-title">{{$servico->NomeServico}}</h5>
            <p class="card-text">{{$servico->Descricao}}</p>
            <a href="/agendamento/{{$servico->IdServicos}}" class="btn btn-primary link-agendar">Agendar</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
