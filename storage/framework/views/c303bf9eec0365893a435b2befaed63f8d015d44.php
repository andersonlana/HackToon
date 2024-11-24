

<?php $__env->startSection('title',  'Meus Serviços'); ?>

<?php $__env->startSection('content'); ?>

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
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($servico->IdServicos); ?></td>
          <td><?php echo e($servico->user->name); ?></td>
          <td><?php echo e($servico->servico->NomeServico); ?></td>
          <td><?php echo e($servico->Telefone); ?></td>
          <td><?php echo e($servico->Cep); ?></td>
          <td><?php echo e($servico->Endereco); ?></td>
          <td><?php echo e($servico->Numero); ?></td>
          <td><?php echo e($servico->Complemento); ?></td>
          <td><?php echo e($servico->Cidade); ?></td>
          <td><?php echo e($servico->Estado); ?></td>
          <td><?php echo e($servico->Preco); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
      </tbody>
    </table>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/servicos/meus-servicos.blade.php ENDPATH**/ ?>