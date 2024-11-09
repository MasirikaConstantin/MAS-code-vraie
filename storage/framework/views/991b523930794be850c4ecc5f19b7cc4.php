<?php $__env->startSection('titre', Str::substr($astuce->titre,0,20)); ?>
<?php $__env->startSection('section',($astuce->titre)); ?>
<?php $__env->startSection('contenus'); ?>

<?php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
$count =0;
$count1=0;
                        $k =0;
                        $class=null;
                      if($astuce->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($astuce->categorie_id==33){
                                $class='language-css';
                            }
                            elseif($astuce->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($astuce->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($astuce->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($astuce->categorie_id==6){
                                $class='language-java';
                            }else{
                                $class='language-html';

                            }
?>

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenu Principal -->
        <div class="lg:w-2/3">
            <article class="bg-slate-900 rounded-xl shadow-xl p-6 mb-8">
                <!-- Média -->
                <?php if(session('success')): ?>
                <div class="bg-green-100 mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                    <h3><?php echo e(session('success')); ?></h3>
                </div>
              <?php endif; ?>
                <div class="mb-8">
                    <?php if($astuce->video): ?>
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class="w-full h-full rounded-lg"
                                src="<?php echo e($astuce->video); ?>"
                                allowfullscreen>
                            </iframe>
                        </div>
                   
                    <?php endif; ?>
                    <?php if($astuce->image): ?>
                    <img src="<?php echo e($astuce->imageUrlAstuce()); ?>"
                        class="w-full h-auto rounded-lg object-cover"
                        alt="<?php echo e($astuce->titre); ?>">
                        <?php endif; ?>
                </div>

                <!-- Contenu -->
                <div class="prose prose-invert max-w-none">
                    <?php echo $astuce->contenus; ?>

                </div>

                <!-- Métadonnées -->
                <div class="mt-8 bg-slate-800 rounded-lg p-6 space-y-4">
                    <!-- Catégorie -->
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Catégorie:</span>
                        <span class="px-3 py-1 bg-indigo-500/30 text-indigo-300 rounded-full text-sm">
                            <?php echo e($astuce->category->titre); ?>

                        </span>
                    </div>

                    <!-- Tags -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-slate-400">Tags:</span>
                        <?php $__currentLoopData = $astuce->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tag->status == false): ?>
                        <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                            <?php echo e($tag->nom); ?>

                        </span>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Mise à jour -->
                    <div class="text-slate-400">
                        Mise à jour il y a: <span class="text-white font-medium"><?php echo e($astuce->created_at->diffForHumans()); ?></span>
                    </div>

                    <!-- Auteur -->
                    <div class="flex items-center gap-4">
                        <span class="text-slate-400">Auteur:</span>
                        <button class="flex items-center gap-3" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                          <?php
                          ?>  
                          <?php if($astuce->users->image): ?>
                                <img src="<?php echo e($astuce->users->imageUrls()); ?>"
                                    class="w-12 h-12 rounded-full object-cover"
                                    alt="null">
                            <?php else: ?>
                                <div class="w-12 h-12 rounded-full bg-slate-700 flex items-center justify-center">
                                  <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  
                                  
                                </div>
                            <?php endif; ?>
                            <span class="text-white font-medium"><?php echo e($astuce->users->name); ?></span>
                            
                        </button>
                    </div>
                </div>










                <section class="not-format mt-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-200 dark:text-white">Discussion</h2>
                    </div>
                    <form method="POST" class="mb-6">
                      <?php echo csrf_field(); ?>
                
                      <?php if(auth()->guard()->check()): ?>
                      <input hidden type="text" value="<?php echo e(Auth::user()->id); ?>" name="user_id"  />
                      <input hidden type="text" value="<?php echo e($astuce->id); ?>" name="astuce_id"  />
                  
                      <?php endif; ?>
                      <?php $__errorArgs = ["user_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <?php $__errorArgs = ["astuce_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      <?php $__errorArgs = ["codesource"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="contenus" rows="3"
                                class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a comment...(*)" required><?php echo e(old('contenus')); ?></textarea>
                        </div>
                        <?php $__errorArgs = ["contenus"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium">Erreur !</span> <?php echo e($message); ?>

                            </div>
                          </div>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                      <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea name="codesource" rows="3"
                            class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Code Source (Facultatif)" ><?php echo e(old('codesource')); ?></textarea>
                    </div>
                    <?php $__errorArgs = ["codesource"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Erreur !</span> <?php echo e($message); ?>

                        </div>
                      </div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        
                
                        <?php if(auth()->guard()->check()): ?>
                        <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Commenter
                    </button>   
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                          <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                              <a href="<?php echo e(route('login')); ?>">Se connecter avant de commenter cette astuce</a>
                          </div>
                        <?php endif; ?>
                    </form>
                    <?php $__currentLoopData = $commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $count++;
                          $k++;
                      ?>
                    <article class="p-6 mb-6 text-base bg-gray-800 rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                         
                
                                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-200 dark:text-white">
                                  <?php if($comm->user->image): ?>
                                  <img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        src="<?php echo e($comm->user->imageUrls()); ?>"
                                        alt="<?php echo e($comm->user->name); ?>"><?php echo e($comm->user->name); ?></p>
                                      <p class="text-sm text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022"><?php echo e($comm->created_at->diffForHumans()); ?></time>
                                      
                                        <?php else: ?>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($count); ?>">
                              
                                        <a  id="exemple">
                                            <i class="bi bi-person-circle s "></i>
                              
                                        </a>
                                      </button>
                                  
                                        <?php endif; ?></p>
                            </div>
                            <?php if(auth()->guard()->check()): ?>
                              <?php if($comm->user->id == Auth::user()->id): ?>
                            <button id="dropdownComment<?php echo e($k); ?>Button" data-dropdown-toggle="dropdownComment<?php echo e($k); ?>"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-gray-800 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-750 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                      <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                  </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment<?php echo e($k); ?>"
                                class="hidden z-10 w-36 bg-gray-800 rounded divide-y divide-gray-800 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-100 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="<?php echo e(route('edit.comm',['comment'=>$comm->id])); ?>"
                                            class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white"><?php echo e(__('Edit')); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('deletecomm',['id'=>$comm->id])); ?>"
                                            class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">Supprimerr</a>
                                    </li>
                                   
                                </ul>
                            </div>
                            <?php endif; ?>
                          <?php endif; ?>
                        </footer>
                        <p>
                          <?php echo e($comm->contenus); ?>

                
                              <?php if($comm->codesource): ?>
                                <pre style="" class="border border-5  mt-5 " ><code class="<?php echo e($class); ?>"><?php echo e(($comm->codesource)); ?></code></pre>
                              <?php endif; ?>
                        </p>
                        
                    </article>
                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-6">
                      <?php echo e($commentaires->links()); ?>

                    </div>
                

                    
                    </section>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <div class="bg-slate-900 rounded-xl shadow-xl p-6">
                <h4 class="text-xl font-bold text-white mb-6">
                    Autres astuces du genre
                </h4>
               
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $ast1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('astuces.shoastuce',['nom'=>$t->slug,'astuce'=>$t->id])); ?>"
                            class="block group hover:bg-slate-800 p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 text-indigo-400">
                                    <?php echo $astuce->category->svg; ?>

                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white font-medium group-hover:text-indigo-400 transition-colors">
                                        <?php echo e($t->titre); ?>

                                    </h3>
                                    <p class="text-slate-400 text-sm mt-1">
                                        <?php echo e(Str::limit($astuce->description,150)); ?>

                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php $__currentLoopData = $ast2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-slate-800 p-4 rounded-lg">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 text-indigo-400">
                                        <?php echo $d->category->svg; ?>

                                    </div>
                                    <div>
                                        <h3 class="text-white font-medium"><?php echo e($d->titre); ?></h3>
                                        <p class="text-slate-400 text-sm">Brief description</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

  <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-slate-900   rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-4 md:p-5 text-center">
                  <h5 class="text-xl font-bold text-white">Profile</h5>
              </div>
                <div class="bg-slate-900 rounded-xl p-6 max-w-lg mx-auto">
                  
                 
                  <div class="flex gap-6">
                      <div class="flex-shrink-0">
                          <?php if($astuce->users->image): ?>
                              <img src="<?php echo e($astuce->users->imageUrls()); ?>"
                                  class="w-32 h-32 rounded-full object-cover"
                                  alt="<?php echo e($astuce->users->name); ?>">
                          <?php else: ?>
                              <div class="w-32 h-32 rounded-full bg-slate-700 flex items-center justify-center">
                                  <svg class="w-[98px] h-[98px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  
                                  
                              </div>
                          <?php endif; ?>
                      </div>
                     
                      <div class="flex-1 text-slate-300 space-y-2">
                          <p>Nom: <span class="text-white font-medium"><?php echo e($astuce->users->name); ?></span></p>
                          <p>Nous a rejoint le: <span class="text-white font-medium"><?php echo e($astuce->users->created_at->formatLocalized(' %d %B %Y')); ?></span></p>
                          <p class="text-sm">Nombre d'abonnés: <?php echo e($astuce->users->subscribers()->count()); ?></p>
                          <a href="<?php echo e(route('user.profil', ['user'=>$astuce->users,'nom'=>Str::slug($astuce->users->name,'-')])); ?>"
                              class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors">
                              Voir le profil
                          </a>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
  



  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/user/astuces.blade.php ENDPATH**/ ?>