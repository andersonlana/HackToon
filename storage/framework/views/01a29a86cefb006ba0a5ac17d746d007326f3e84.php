

<?php $__env->startSection('title',  'Meus Agendamentos'); ?>

<?php $__env->startSection('content'); ?>

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
      <?php $__currentLoopData = $agendamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agendamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($agendamento->IdAgendamento); ?></td>
          <td><?php echo e($agendamento->user->name); ?></td>
          <td><?php echo e($agendamento->servico->NomeServico); ?></td>
          <td><?php echo e($agendamento->profissional->name); ?></td>
          <td><?php echo e(\Carbon\Carbon::parse($agendamento->DataHora)->format('d/m/Y H:i')); ?></td>
          <td><?php echo e($agendamento->status->Descricao); ?></td>
          <td>
            <a href="/cancelar-agendamento/<?php echo e($agendamento->IdAgendamento); ?>" class="btn btn-primary btn-sm">Cancelar</a>
            <!-- <button class="btn btn-danger btn-sm">Excluir</button> -->
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
      </tbody>
    </table>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/agendamentos/meus-agendamentos.blade.php ENDPATH**/ ?>