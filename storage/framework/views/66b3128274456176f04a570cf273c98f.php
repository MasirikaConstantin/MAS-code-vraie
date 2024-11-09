<?php $__env->startSection('titre','Forum'); ?>
<?php $__env->startSection('contenus'); ?>
<?php $__env->startSection('section','    '); ?>
<link rel="stylesheet" href="">
<div class="bg-gradient-to-r rounded rounded-xl from-blue-900 via-blue-800 to-blue-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-4">Forum Actualités</h1>
        <p class="text-xl text-blue-200">Bienvenue sur notre plateforme de questions et réponses. Partagez vos questions et contribuez avec vos réponses.</p>
    </div>
</div>
<?php
      $count=0;
    ?>
<!-- Section Recent Updates -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-2xl p-6 border border-gray-200/20">
        <h2 class="text-2xl font-bold mb-6 text-blue-600">Mises à jour récentes</h2>
        
        <?php $__currentLoopData = $recents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $titre1 = str_replace(' ', '-', $recent->slug);
        ?>
        <div class="flex space-x-4 py-4 border-b border-gray-200/30 hover:bg-gray-700 rounded rounded-3  transition duration-200">
            <?php if($recent->users->image): ?>
                <img class="ms-3 h-12 w-12 rounded-full object-cover" src="<?php echo e($recent->users->imageUrls()); ?>" alt="<?php echo e($recent->users->name); ?>">
            <?php else: ?>
                <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            <?php endif; ?>
            
            <div class="flex-1">
                <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre1),'post'=>$recent])); ?>" class="block hover:text-blue-600 transition">
                    <h3 class="font-semibold text-gray-300"><?php echo e($recent->users->name); ?></h3>
                              <p class="text-gray-100 mt-1"> <?php echo e(Str::limit($recent->contenus,200)); ?> </p>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="text-right mt-6">
            <a href="<?php echo e(route('tous')); ?>" class="text-blue-600 hover:text-blue-800 font-medium">Voir toutes les publications →</a>
        </div>
    </div>
</div>

<!-- Posts Principal -->
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $titre = str_replace(' ','-',$post->slug);
    $count++;
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
    <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-2xl overflow-hidden border border-gray-200/20">
        <!-- Header du post -->
        <div class="p-6 border-b border-gray-200/30">
            <div class="flex items-center space-x-4">
                <button type="button" class="focus:outline-none"  data-modal-target="userModal<?php echo e($count); ?>" data-modal-toggle="userModal<?php echo e($count); ?>">
                    <?php if($post->users->image): ?>
                        <img class="h-12 w-12 rounded-full object-cover" src="<?php echo e($post->users->imageUrls()); ?>" alt="<?php echo e($post->users->name); ?>">
                    <?php else: ?>
                        <img class="h-12 w-12 rounded-full object-cover" src="<?php echo e(asset('téléchargement.png')); ?>" alt="Default">
                    <?php endif; ?>
                </button>


                <div>
                    <h2 class="text-xl font-bold text-gray-300"><?php echo e($post->titre); ?></h2>
                    <p class="text-sm text-gray-500">
                        <?php if($post->created_at != $post->updated_at): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Modifié le <?php echo e($post->updated_at->formatLocalized('%d %B %Y')); ?> à <?php echo e($post->updated_at->format('H:i')); ?>

                            </span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Contenu du post -->
        <div class="p-6">
            <p class="text-gray-200 mb-4"><?php echo e(Str::limit($post->contenus,576)); ?></p>

            <?php if($post->codesource): ?>
                <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                    <pre><code class="language-<?php echo e($post->category->language ?? 'plain'); ?> text-sm"><?php echo e(Str::limit($post->codesource,250)); ?></code></pre>
                </div>
            <?php endif; ?>

            <?php if($post->image): ?>
                <div class="mt-4 rounded-lg overflow-hidden">
                    <img data-fancybox src="<?php echo e($post->imageUrl()); ?>" alt="<?php echo e($post->titre); ?>" 
                         class="w-full h-[300px] object-cover transform hover:scale-105 transition duration-300">
                </div>
            <?php endif; ?>

            <!-- Footer du post -->
            <div class="mt-6 flex flex-wrap gap-2">
                <?php if($post->category): ?>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        <?php echo e($post->category->titre); ?>

                    </span>
                <?php endif; ?>

                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                    <?php echo e($tag->nom); ?>

                </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                <div class="flex items-center space-x-4">
                    <span><?php echo e($post->views_count); ?> <?php echo e($post->views_count > 1 ? 'vues' : 'vue'); ?></span>
                    <span>Par : <i class="text-gray-100" ><?php echo e($post->users->name); ?></i></span>
                    <p>Publié le : <span class="text-gray-200"><?php echo e($post->updated_at->formatLocalized('%d %B %Y')); ?></span> </p>
                </div>
                <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre),'post'=>$post])); ?>" 
                   class="text-blue-600 hover:text-blue-800 font-medium">
                    Lire la suite →
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="userModal<?php echo e($count); ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center backdrop-blur-xl">
  <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <!-- Modal Container -->
      <div class="relative bg-gradient-to-br from-violet-950/90 to-indigo-950/90 rounded-2xl shadow-2xl border border-violet-500/20">
          <!-- Modal Header -->
          <div class="flex justify-between items-center p-5 rounded-t border-b border-violet-600/30 bg-violet-900/30 backdrop-blur-sm">
              <h3 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                  Profil utilisateur
              </h3>
              <button type="button" 
                      class="text-violet-300 hover:text-white bg-violet-800/30 hover:bg-violet-700/50 rounded-lg p-2 transition-all duration-300 transform hover:scale-105" 
                      data-modal-toggle="userModal<?php echo e($count); ?>">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
              </button>
          </div>

          <!-- Modal Body -->
          <div class="p-6 space-y-6 bg-gradient-to-br from-violet-900/50 to-indigo-900/50 rounded-b-2xl backdrop-blur-md">
              <div class="backdrop-filter backdrop-blur-sm bg-white/5 rounded-xl p-6 border border-violet-500/20 shadow-lg">
                  <div class="flex items-center space-x-6">
                      <!-- Image Section -->
                      <div class="flex-shrink-0 relative group">
                          <?php if($post->users->image): ?>
                              <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300" 
                                   src="<?php echo e($post->user->imageUrls()); ?>" 
                                   alt="<?php echo e($post->user->name); ?>"
                              />
                          <?php else: ?>
                              <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300"
                                   src="<?php echo e(asset('téléchargement.png')); ?>" 
                                   alt="Default profile"
                              />
                          <?php endif; ?>
                          <div class="absolute inset-0 rounded-full bg-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                      </div>

                      <!-- User Info Section -->
                      <div class="flex-1 space-y-4">
                          <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                              <?php echo e($post->user->name); ?>

                          </h3>

                          <p class="text-violet-200 font-medium">
                              Membre depuis 
                              <span class="text-pink-200 font-semibold">
                                  <?php echo e($post->user->created_at->diffForHumans( )); ?>

                              </span>
                          </p>

                          <p class="text-violet-300/90">
                              <span class="text-sm flex items-center gap-2">
                                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                  </svg>
                                  <?php echo e($post->user->subscribers()->count()); ?> abonnés
                              </span>
                          </p>

                          <a href="<?php echo e(route('user.profil', ['user'=>$post->user,'nom'=>(Str::slug($post->user->name,'-'))])); ?>"
                             class="inline-block px-6 py-2.5 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white font-medium rounded-full transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-violet-500/50">
                              Voir le profil
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Pagination -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <?php echo e($posts->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/accueil.blade.php ENDPATH**/ ?>