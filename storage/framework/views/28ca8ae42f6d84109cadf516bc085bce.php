<?php $__env->startSection('section','Admin Astuce'); ?>
<?php $__env->startSection('titre', 'Admin Astuce'); ?>
<?php $__env->startSection('contenus'); ?>
<p>Les plus recents</p>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">


    <?php $__empty_1 = true; $__currentLoopData = $astuces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $astuce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col mt-2">
            <div class="card text-center">
                <div class="card-header">
                <?php echo e($astuce->titre); ?> <span class="badge <?php echo e($astuce->etat==1 ? 'bg-success' :'bg-warning'); ?> text-center "><?php echo e($astuce->etat==1 ? 'Posté' :'En attente'); ?></span>
                </div>
                <div class="card-body">
                <h5 class="card-title"><strong><?php echo e($astuce->users->name); ?></strong></h5>
                <p class="card-text"><?php echo e($astuce->description); ?></p>
                <a href="<?php echo e(route('admin.gerer',['id'=>$astuce])); ?>" class="btn btn-primary">Administrer</a>
                </div>
                <div class="card-footer text-muted">
                2 days ago
                </div>
            </div>
        </div>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-success">
            <p>Aucune astuce en attente</p>
        </div>
    <?php endif; ?>

  </div>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
    <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
<?php echo e($astuces->links()); ?>

    
</div>
</div>

<hr class="my-4" >
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/admin/adminastuce.blade.php ENDPATH**/ ?>