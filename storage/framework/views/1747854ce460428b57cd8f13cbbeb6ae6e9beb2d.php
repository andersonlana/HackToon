

<?php $__env->startSection('title',  'Criar Tarefa'); ?>

<?php $__env->startSection('content'); ?>

<div id="tarefa-create-container" class="col-md-6 offset-md-3">
    <h1 class="text-center mb-4">Cadastro de Tarefa</h1>
    <form action="/salvar-agendamento" method="POST" >
        <?php echo csrf_field(); ?>
        
        </div>
        <div class="form-group spacing">
            <label for="description">Calendario:</label>
            <input type="datetime-local" name="calendario" >
        </div>

        <div class="form-group spacing">
    <label for="servico">Serviço:</label>
    <select name="IdServico" id="servico" class="form-control">
        <option value="" disabled selected>Selecione um serviço</option>
        <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($servico->IdServicos); ?>"><?php echo e($servico->NomeServico); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

    

        <div class="form-group spacing">
            <input type="submit" class="btn btn-primary spacing bt-salvar" value="Salvar">
        </div>

    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\HackToon\resources\views/agendamentos/agendamentos.blade.php ENDPATH**/ ?>