<section>
    <header>
        <h2 class="text-lg font-medium text-body-900">
            <?php echo e(__('Ajouter une Photo de Profil')); ?>

        </h2>

        <p class="mt-1 text-sm text-body-600">
            <?php echo e(__('Ajouter une photo pour une meilleur identification')); ?>

        </p>
    </header>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap.min.css')); ?>">
    <style>
      
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </style>

    <form method="post" action="<?php echo e(route('photo')); ?>" class="" enctype="multipart/form-data" >
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        





        <main class="mt-1">
          
          <?php echo e(Auth::user()->name); ?>

            <div class="row" data-masonry='{"percentPosition": true }'>
              
              <div class="mb-1">
                <label for="formFile" class="form-label">Choisir une photo</label>
                <input class="form-control" <?php echo e(old('image')); ?> name="image" type="file" id="fileUpload">
              </div>
              

              <div class="col-sm mb-3 ">
                <div class="card" style="width: 322px!important; height: 250px;">
                
                    
                    <img id='imageDiv' class="h-s100" style=" height:220px ; width: 100% ; height: 250px; object-fit: cover "  />
                  
                  
                  
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              </div>
            </div>
            
          
          </main>
          <div class="flex items-center gap-4">
            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

            <?php if(session('status') === 'password-updated'): ?>
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-body-600"
                ><?php echo e(__('Saved.')); ?></p>
            <?php endif; ?>
        </div>
    </form>
</section>
<?php /**PATH /home/masirika-constantin/Vidéos/Mas-Code/resources/views/profile/partials/picture.blade.php ENDPATH**/ ?>