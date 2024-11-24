

<?php $__env->startSection('title',  'Criar Tarefa'); ?>

<?php $__env->startSection('content'); ?>


<div id="tarefa-create-container" class="col-md-6 offset-md-3">
<<<<<<< HEAD
    <h1 class="text-center mb-4">Cadastro de Tarefa</h1>
    <form action="/salvar-agendamento" method="POST" >
        <?php echo csrf_field(); ?>
        
        </div>

        <div class="form-group spacing">
            <label for="description">Calendario:</label>
            <input type="hidden" name="IdServico" value="<?php echo e($IdServico); ?>"  >
        </div>
        <div class="form-group spacing">
            <label for="description">Calendario:</label>
            <input type="datetime-local" name="calendario" >
        </div>

        <div class="form-group spacing">
    <label for="servico">Serviço:</label>
    <select name="IdProfissional" id="servico" class="form-control">
        <option value="" disabled selected>Selecione um serviço</option>
        <?php $__currentLoopData = $profissionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($prof->IdProfissional); ?>"><?php echo e($prof->Nome); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

    

        <div class="form-group spacing">
=======
   <h2 class="text-center mb-4">Agendamento<span id="profissional-name"></span></h2>
   <form action="/salvar-agendamento" method="POST" >
      <?php echo csrf_field(); ?>
      <div class="container-agendamento">
         <div class="row">
            <div class="form-group spacing col-6">
               <label for="customer-email" class="mt-2">Cidade</label>
               <input type="text" class="form-control mt-2" id="customer-email" name="customer-email" required>
            </div>
            <div class="form-group spacing col-6">
               <label for="customer-email" class="mt-2">Estado</label>
               <input type="text" class="form-control mt-2" id="customer-email" name="customer-email" required>
            </div>
         </div>
         <div class="form-group spacing">
            <label for="description" class="mt-2">Data e Hora:</label>
            <input type="datetime-local" class="form-control mt-2" name="calendario" >
         </div>
         <div class="form-group spacing">
            <label for="servico" class="mt-2">Profissional:</label>
            <select name="IdProfissional" id="servico" class="form-control mt-2">
               <option value="" disabled selected>Selecione um Profissional</option>
               <?php $__currentLoopData = $profissionais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($prof->IdProfissional); ?>"><?php echo e($prof->Nome); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
         </div>
         <div class="form-group spacing input-agendamento">
>>>>>>> 08dafa0b0b9d8620f9f5f28ceb688a11c7a23012
            <input type="submit" class="btn btn-primary spacing bt-salvar" value="Salvar">
         </div>
   </form>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/agendamentos/agendamentos.blade.php ENDPATH**/ ?>