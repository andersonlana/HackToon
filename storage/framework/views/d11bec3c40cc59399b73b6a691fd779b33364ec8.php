

<?php $__env->startSection('title',  'HackToon'); ?>

<?php $__env->startSection('content'); ?>

<!-- Carrossel -->
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

<!-- Título com frase bonita -->
<h1 class="text-center my-4">Encontre os melhores serviços, feitos especialmente para você!</h1>

<!-- Lista de Serviços -->
<div class="row">
  <div class="categoria col-4 text-center" data-servicos="Consulta Médica, Exame de Sangue, Ultrassonografia, Cirurgia Plástica, Consulta Psiquiátrica, Fisioterapia Traumática, Fisioterapia Respiratória, Reabilitação Pós-Cirúrgica, Fisioterapia Ortopédica, Fisioterapia Neurológica">
    <h4>Saúde</h4>
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
  <div class="categoria col-4 text-center" data-servicos="Troca de Óleo, Revisão de Freios, Alinhamento e Balanceamento, Troca de Pneus, Reparo de Suspensão">
    <h4>Automóvel</h4>
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
  <div class="categoria col-4 text-center" data-servicos="Corte de Cabelo, Penteado, Hidratação Capilar, Tintura de Cabelo, Escova Progressiva">
    <h4>Beleza</h4>
    <div class="servicos-dropdown">
      <div class="lista-servicos"></div>
    </div>
  </div>
</div>

<!-- Filtro de pesquisa com input do Bootstrap -->
<div class="filtro-container text-center mb-4">
  <div class="input-group justify-content-center">
    <input type="text" id="pesquisa-servico" class="form-control" placeholder="Pesquisar serviço..." aria-label="Pesquisar serviço...">
    <button class="btn btn-outline-secondary" type="button">
      <i class="bi bi-search"></i> <!-- Lupa do Bootstrap Icons -->
    </button>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/welcome.blade.php ENDPATH**/ ?>