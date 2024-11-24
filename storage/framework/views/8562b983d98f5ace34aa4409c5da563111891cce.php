

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
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $agendamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agendamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>1</td>
          <td><?php echo e($agendamento->iduser); ?></td>
          <td><?php echo e($agendamento->IdServico); ?></td>
          <td><?php echo e($agendamento->IdProfissional); ?></td>
          <td><?php echo e($agendamento->DataHora); ?></td>
          <td>
            <button class="btn btn-primary btn-sm">Editar</button>
            <button class="btn btn-danger btn-sm">Excluir</button>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        <!-- <tr>
          <td>2</td>
          <td>Maria Santos</td>
          <td>maria@email.com</td>
          <td>(21) 98888-8888</td>
          <td>Aprovado</td>
          <td>
            <button class="btn btn-primary btn-sm">Editar</button>
            <button class="btn btn-danger btn-sm">Excluir</button>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Pedro Almeida</td>
          <td>pedro@email.com</td>
          <td>(31) 97777-7777</td>
          <td>Aprovado</td>
          <td>
            <button class="btn btn-primary btn-sm">Editar</button>
            <button class="btn btn-danger btn-sm">Excluir</button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/agendamentos/meusAgendamentos.blade.php ENDPATH**/ ?>