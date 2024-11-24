

<?php $__env->startSection('title',  'HackToon'); ?>

<?php $__env->startSection('content'); ?>

<div id="carouselServicos" class="carousel slide small-carousel" data-bs-ride="carousel" style="max-width: 600px; margin: auto;">
  <div class="carousel-inner">
    <?php $__currentLoopData = $servicosCarousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
        <a href="/agendamento/<?php echo e($servico->IdServicos); ?>">
          <img class="d-block w-100" src="<?php echo e($servico->Imagem); ?>" alt="<?php echo e($servico->NomeServico); ?>">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo e($servico->NomeServico); ?></h5>
            <p><?php echo e($servico->Descricao); ?></p>
          </div>
        </a>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselServicos" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselServicos" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
        <?php $__currentLoopData = $servicosSaude; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saude): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="dropdown-item" href="/agendamento/<?php echo e($saude->IdServicos); ?>"><?php echo e($saude->NomeServico); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <!-- Categoria Automóvel -->
    <div class="dropdown col-12 col-md-4 text-center mb-3">
      <h4 class="nav-link dropdown-toggle" href="#" id="dropdownAutomovel" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-tools me-2 text-black"></i>Automóvel
      </h4>
      <div class="dropdown-menu" aria-labelledby="dropdownAutomovel">
      <?php $__currentLoopData = $servicosAutomovel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $automovel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="dropdown-item" href="/agendamento/<?php echo e($automovel->IdServicos); ?>"><?php echo e($automovel->NomeServico); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <!-- Categoria Beleza -->
    <div class="dropdown col-12 col-md-4 text-center mb-3">
      <h4 class="nav-link dropdown-toggle" href="#" id="dropdownBeleza" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="bi bi-scissors me-2 text-black"></i>Beleza
      </h4>
      <div class="dropdown-menu" aria-labelledby="dropdownBeleza">
      <?php $__currentLoopData = $servicosBeleza; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beleza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="dropdown-item" href="/agendamento/<?php echo e($beleza->IdServicos); ?>"><?php echo e($beleza->NomeServico); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4">
        <div class="card">
          <img src="<?php echo e($servico->Imagem); ?>" class="card-img" alt="Dica 1">
          <div class="card-body">
            <h5 class="card-title"><?php echo e($servico->NomeServico); ?></h5>
            <p class="card-text"><?php echo e($servico->Descricao); ?></p>
            <a href="/agendamento/<?php echo e($servico->IdServicos); ?>" class="btn btn-primary link-agendar">Agendar</a>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/welcome.blade.php ENDPATH**/ ?>