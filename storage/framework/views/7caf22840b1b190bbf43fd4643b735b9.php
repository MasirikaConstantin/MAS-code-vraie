<?php $__env->startSection('section','Modifier Votre commentaire'); ?>
<?php $__env->startSection('contenus'); ?>
<?php
                      $class=null;
                            if($comment->post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($comment->post->categorie_id==2){
                                $class='language-css';
                            }
                            elseif($comment->post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($comment->post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($comment->post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($comment->post->categorie_id==6){
                                $class='language-java';
                            }
                            //endif
                      ?>
<section class="bg-gray-900 py-8  antialiased adrks:bg-gray-900 md:py-16">
<ul class="list-none space-y-4">
    <?php if(session('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md shadow-md">
      <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <div class="w-full h-0.5 bg-gray-200 my-6 rounded-md"></div>

    <li class="shadow-lg bg-gray-800 rounded-lg p-6 border-t border-gray-300 space-y-4">
       
        <?php if(Auth::user()->image): ?>
                        <img class="mr-4 w-16 h-16 rounded-full border-2 border-indigo-500" src="<?php echo e(Auth::user()->imageUrls()); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                    <?php else: ?>
                        <div class="w-12 h-12 rounded-full bg-slate-700 flex items-center justify-center">
                            <svg class="w-[48px] h-[48px] text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </div>
                    <?php endif; ?>
        
        <p class="mt-4 text-lg text-gray-200 font-semibold"><?php echo e($comment->contenus); ?></p>

        <?php if($comment->codesource): ?>
        <pre class="border border-gray-300 bg-gray-50 p-4 mt-5 rounded-md shadow-inner overflow-x-auto"><code class="<?php echo e($class); ?>"><?php echo e($comment->codesource); ?></code></pre>
        <?php endif; ?>

        <hr class="my-4 border-gray-200">

        <p class="text-sm text-gray-500">Publié le : <?php echo e($comment->updated_at->formatLocalized('%d %B %Y')); ?></p>
    </li>

</ul>

<form method="post" class="mt-10 bg-gray-800 space-y-6">
    <?php echo csrf_field(); ?>
    <div class="flex bg-gray-500 flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6 bg-gray-100 p-6 rounded-lg shadow-md">
        
        <div class="flex-1 bg-gray-500 ">
            <label for="exampleFormControlTextarea1" class="block text-center font-medium text-gray-700 mb-2">Votre Message</label>
            <?php $__errorArgs = ["contenus"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
              <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <textarea class="w-full p-4 bg-gray-300 text-gray-800 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="contenus" id="exampleFormControlTextarea1" rows="5"><?php echo e($comment->contenus); ?></textarea>
        </div>

        <div class="flex-1">
            <label for="exampleFormControlTextarea2" class="block text-center font-medium text-gray-700 mb-2">Code Source (si possible)</label>
            <?php $__errorArgs = ["codesource"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
                    <?php echo e($message); ?>

                </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <textarea class="w-full p-4 bg-gray-300 border text-gray-800 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="codesource" id="exampleFormControlTextarea2" rows="5"><?php echo e($comment->codesource); ?></textarea>
        </div>

    </div>

    <div class="text-center mb-6">
        <button type="submit" class="bg-indigo-600 mb-6 text-white px-6 py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Mettre à jour
        </button>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/modifcomm.blade.php ENDPATH**/ ?>