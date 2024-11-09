<?php $__env->startSection('section',$tag->exists ? 'Editer un Tag' :'Créer un Tag'); ?>
<?php $__env->startSection('titre', $tag->exists ? 'Editer un Tag' :'Créer un Tag'); ?>
<?php $__env->startSection('contenus'); ?>


  <form action="<?php echo e(route($tag->exists ? 'admin.edittag': 'admin.newtag', $tag)); ?>" method="post" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
  
    <div class="form-floating mb-3">
      <input type="text" name="nom" class="form-control" id="floatingInput" value="<?php echo e(old('nom',$tag->nom)); ?>" >
      <label for="floatingInput">Titre</label>
      <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger mt-2">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="form-floating mt-2 ">
      <select <?php if(old($tag->couleur)): echo 'selected'; endif; ?> class="form-select" name="couleur" id="floatingSelect" aria-label="Floating label select example">
        <option  <?php if($tag->couleur=='primary'): echo 'selected'; endif; ?> value="primary" >Bleu</option>
        <option  <?php if($tag->couleur=='light'): echo 'selected'; endif; ?> value="light">Blanche</option>
        <option  <?php if($tag->couleur=='secondary'): echo 'selected'; endif; ?> value="secondary">Gris</option>
        <option  <?php if($tag->couleur=='success'): echo 'selected'; endif; ?> value="success">Verte</option>
        <option  <?php if($tag->couleur=='info'): echo 'selected'; endif; ?> value="info">Blue claire</option>
        <option  <?php if($tag->couleur=='warning'): echo 'selected'; endif; ?> value="warning">Jaune</option>
        <option  <?php if($tag->couleur=='danger'): echo 'selected'; endif; ?> value="danger">Rouge</option>
        <option  <?php if($tag->couleur=='dark'): echo 'selected'; endif; ?> value="dark">Noire</option>

      </select>
      <label for="floatingSelect">Selectionner une couleur</label>
    </div>
    <?php $__errorArgs = ['couleur'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger mt-2">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



    <div class="form-check form-switch mt-2">
      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" <?php echo e($tag->status == 1 ? "checked" : ""); ?>  >
      <label class="form-check-label" for="flexSwitchCheckChecked">Masqué</label>
    </div>
<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <?php echo e($message); ?>

<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div class="col-auto mt-3">
      <button type="submit"  class="btn btn-primary mb-3">
        <?php if($tag->exists): ?>
          Modifier
        <?php else: ?>
          Ajouter
        <?php endif; ?>
      </button>
    </div>
  </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/admin/tags.blade.php ENDPATH**/ ?>