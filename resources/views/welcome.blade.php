@extends('layouts.main')

@section('title',  'HackToon')

@section('content')

<div class="carrossel">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/img/fusaoo.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<h2 class="text-center my-4">Encontre os melhores serviços, feitos especialmente para você!</h2>

<div class="row">
  <div class="categoria col-4 text-center" data-servicos="Consulta Médica, Exame de Sangue, Ultrassonografia, Cirurgia Plástica, Consulta Psiquiátrica, Fisioterapia Traumática, Fisioterapia Respiratória, Reabilitação Pós-Cirúrgica, Fisioterapia Ortopédica, Fisioterapia Neurológica">
    <h4><i class="bi bi-plus-circle me-2"></i>Saúde</h4> <!-- Ícone de Cruz -->
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
  <div class="categoria col-4 text-center" data-servicos="Troca de Óleo, Revisão de Freios, Alinhamento e Balanceamento, Troca de Pneus, Reparo de Suspensão">
    <h4><i class="bi bi-tools me-2"></i>Automóvel</h4>
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
  <div class="categoria col-4 text-center" data-servicos="Corte de Cabelo, Penteado, Hidratação Capilar, Tintura de Cabelo, Escova Progressiva">
    <h4><i class="bi bi-scissors me-2"></i>Beleza</h4>
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
</div>

<div class="filtro-container text-center mb-4">
  <div class="input-group justify-content-center">
    <input type="text" id="pesquisa-servico" class="form-control" placeholder="Pesquisar serviço..." aria-label="Pesquisar serviço...">
    <button class="btn btn-outline-secondary" type="button">
      <i class="bi bi-search"></i> 
    </button>
  </div>
</div>

<div class="blog text-center my-5">
  <h2>Serviços</h2>
  
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <img src="/img/saude.jpg" class="card-img" alt="Dica 1">
        <div class="card-body">
          <h5 class="card-title">Como escolher o melhor serviço de saúde</h5>
          <p class="card-text">Veja as melhores práticas para escolher o atendimento ideal para você e sua família.</p>
          <a href="/agendamento/1" class="btn btn-primary">Leia mais</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="/img/automovel.jpg" class="card-img" alt="Dica 2">
        <div class="card-body">
          <h5 class="card-title">Dicas para cuidar do seu carro</h5>
          <p class="card-text">Saiba como manter seu veículo em perfeito estado e evitar surpresas.</p>
          <a href="/agendamento/2" class="btn btn-primary">Leia mais</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <img src="/img/beleza.jpg" class="card-img" alt="Dica 3">
        <div class="card-body">
          <h5 class="card-title">Tendências de beleza para 2024</h5>
          <p class="card-text">Fique por dentro das últimas tendências de cabelo e estética.</p>
          <a href="/agendamento/3" class="btn btn-primary">Leia mais</a>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
