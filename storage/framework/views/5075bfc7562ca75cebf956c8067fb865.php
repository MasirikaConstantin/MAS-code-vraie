<?php $__env->startSection('section',$category->exists ? 'Editer une  Categorie' :'Créer une Categorie'); ?>
<?php $__env->startSection('titre', $category->exists ? 'Editer une Categorie' :'Créer une Categorie'); ?>
<?php $__env->startSection('contenus'); ?>


  <form action="<?php echo e(route($category->exists ? 'admin.editcat': 'admin.newcat', $category)); ?>" method="post" enctype="multipart/form-data" >
    <?php echo csrf_field(); ?>
  
    <div class="form-floating mb-3">
      <input type="text" name="titre" class="form-control" id="floatingInput" value="<?php echo e(old('titre',$category->titre)); ?>" >
      <label for="floatingInput">Titre</label>
      <?php $__errorArgs = ['titre'];
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
      <select <?php if(old($category->couleur)): echo 'selected'; endif; ?> class="form-select" name="couleur" id="floatingSelect" aria-label="Floating label select example">
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="primary" >Bleu</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="light">Blanche</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="secondary">Gris</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="success">Verte</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="info">Blue claire</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="warning">Jaune</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="danger">Rouge</option>
        <option  <?php if(old('couleur', $category->couleur)): echo 'selected'; endif; ?> value="dark">Noire</option>

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


    <div class="row align-items-md-stretch mb-3">
      <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Photo(si possible)</label>
          <input type="file" name="image" class="form-control"  id='fileUpload'/>
      </div>
      <div class="col-md-6 img-c" >
          <img id='imageDiv' class="h-s100" style="width: 320px; height: 200px;"  />
      </div>
      <?php $__errorArgs = ['image'];
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

    <div class="col-md-12">
      <label for="validationDefault03" class="form-label">Code Svg(si possible)</label>
      <input type="text" name="svg" class="form-control"  id='fileUpload'/>
  </div>

    
  </div>

    <div class="form-floating  mt-3">
      <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
        <?php echo e(old('description',$category->description)); ?>

    </textarea>
      <label for="floatingTextarea2">Description</label>

      <?php $__errorArgs = ['description'];
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

    <div class="form-check form-switch mt-2">
      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" <?php echo e($category->status == 1 ? "checked" : ""); ?>  >
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
        <?php if($category->exists): ?>
          Modifier
        <?php else: ?>
          Ajouter
        <?php endif; ?>
      </button>
    </div>
  </form>
    
<script>
  document.getElementById('fileUpload').addEventListener('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
          document.getElementById('imageDiv').src = e.target.result;
      }
      reader.readAsDataURL(this.files[0]);
  });
  </script>
  <script>
  document.getElementById('fileUpload').addEventListener('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
          var img = document.createElement('img');
          img.src = e.target.result;
          document.getElementById('imageDiv').appendChild(img);
      }
      reader.readAsDataURL(this.files[0]);
  });
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/admin/newcat.blade.php ENDPATH**/ ?>