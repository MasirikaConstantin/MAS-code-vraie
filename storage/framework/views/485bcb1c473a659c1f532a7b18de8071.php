<?php $__env->startSection('section',"Moi"); ?>
<?php $__env->startSection('titre',"Mon Compte"); ?>
<?php $__env->startSection('contenus'); ?>
<?php
  $user=Auth::user();
  date_default_timezone_set('Europe/Paris');
?>
<?php
$k=0;
  setlocale(LC_TIME,'fr_FR.utf8');
  \Carbon\Carbon::setLocale('fr');
?>

    <style>
        @keyframes glow {
            0% { box-shadow: 0 0 5px #4f46e5; }
            50% { box-shadow: 0 0 20px #4f46e5; }
            100% { box-shadow: 0 0 5px #4f46e5; }
        }

        <style>
    /* Animation de lueur */
    @keyframes glow {
        0% { box-shadow: 0 0 5px #4f46e5; }
        50% { box-shadow: 0 0 20px #4f46e5; }
        100% { box-shadow: 0 0 5px #4f46e5; }
    }

  
    </style>
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profil Section -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-xl p-6 backdrop-blur-lg border border-indigo-500/20 hover:border-indigo-500/40 transition-all duration-300" style="animation: glow 3s infinite">
                    <!-- Photo de profil -->
                    <div class="flex justify-center mb-6">
                        <?php if(Auth::user()->image!=null): ?>
                            <div class="relative">
                                <img class="w-32 h-32 rounded-full object-cover border-4 border-indigo-500" src="<?php echo e($user->imageUrls()); ?>" alt="<?php echo e($user->name); ?>">
                                <div class="absolute inset-0 rounded-full bg-indigo-500/20 animate-pulse"></div>
                            </div>
                        <?php else: ?>
                            <img class="w-32 h-32 rounded-full border-4 border-indigo-500" src="<?php echo e(asset('téléchargement.png')); ?>" alt="Default">
                        <?php endif; ?>
                    </div>

                    <!-- Informations utilisateur -->
                    <div class="space-y-4">
                        <div class="flex flex-col space-y-2 text-gray-300">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Nom:</span>
                                <span class="font-bold text-indigo-400"><?php echo e($user->name); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Email:</span>
                                <span class="font-bold text-indigo-400"><?php echo e($user->email); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Abonnés:</span>
                                <span class="font-bold text-indigo-400"><?php echo e($user->subscribers()->count()); ?></span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Posts:</span>
                                <span class="font-bold text-indigo-400"><?php echo e($user->posts()->count()); ?></span>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex flex-col space-y-3 mt-6">
                            <a href="<?php echo e(route('profile.edit')); ?>" class="btn-futuristic">
                                <span class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span>Modifier le profil</span>
                                </span>
                            </a>

                            <div class="">
                              <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="w-full bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-all duration-300 flex items-center justify-between" type="button">Action<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                                </button>
                                
                                <div id="multi-dropdown" class="z-10 hidden dropdown-menu hidden absolute w-full mt-2 bg-gray-700 rounded-lg shadow-xl">
                                  <ul class="py-2 text-sm text-gray-700 adrks:text-gray-200" aria-labelledby="multiLevelDropdownButton">
                                    <li>
                                    <a href="<?php echo e(route('astuces.new')); ?>" class="block px-4 py-2 hover:bg-gray-600 text-gray-300 hover:text-white">Astuce</a>
                                    </li>
                                    <li>
                                    <a href="<?php echo e(route('user.newpost')); ?>" class="block px-4 py-2 hover:bg-gray-600 text-gray-300 hover:text-white">Post</a>
                                      
                                    </li>
                                    
                                  </ul>
                              </div>  
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800 rounded-xl p-6 backdrop-blur-lg border border-indigo-500/20">
                    <!-- Navigation tabs -->
                    <div class="flex space-x-4 mb-6">
                        <a href="?demande" class="tab-futuristic <?php echo e(!request('demande') ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline'); ?>">
                            Brouillon
                        </a>
                        <a href="?demande=q" class="tab-futuristic <?php echo e(request('demande') == 'q' ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline'); ?>">
                            Mes Questions
                        </a>
                        <a href="?demande=a" class="tab-futuristic <?php echo e(request('demande') == 'a' ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline'); ?>">
                            Mes Astuces
                        </a>
                    </div>

                    <!-- Content area -->
                    <div class="space-y-6">
                        <!-- Content will be inserted here based on the selected tab -->

                        <?php if(request('demande')=="q"): ?>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $titre = str_replace(' ','-',$post->slug);
                        ?>
                        
                        <div class="py-2 mt-3">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 relative p-6 transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1">
                                    <form method="POST" action="<?php echo e(route('user.posts.update', $post)); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        
                                        <div class="flex flex-wrap gap-4 mb-4">
                                            <div class="flex items-center">
                                                <input type="hidden" name="etat" value="0">
                                                <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-gray-700 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-gray-200 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-indigo-600 checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none hover:cursor-pointer focus:outline-none" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="etat" value="1" <?php echo e($post->etat == 1 ? "checked" : ""); ?>>
                                                <label class="inline-block pl-[0.15rem] text-gray-200 hover:cursor-pointer" for="flexSwitchCheckChecked">Masqué</label>
                                            </div>
                                            <button type="submit" class="px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-lg shadow-indigo-500/20">
                                                Mettre à jour
                                            </button>
                                        </div>
                                    </form>
                    
                                    <div class="space-y-4">
                                        <div class="rounded-lg overflow-hidden bg-gray-900/50 border border-gray-700">
                                            <div class="p-4 bg-gradient-to-r from-gray-900 to-slate-800">
                                                <strong class="text-indigo-400"><?php echo e($post->titre); ?></strong>
                                                <p><a href="<?php echo e(route('user.modif',['post'=>$post->id])); ?>" class="text-indigo-400 hover:text-indigo-300 transition-colors">Modifier</a></p>
                                            </div>
                                            
                                            <div class="p-4 border-t border-gray-700 text-gray-300">
                                                <?php if($post->created_at != $post->updated_at): ?>
                                                <p class="flex items-center gap-2 mb-2">
                                                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                    </svg>
                                                    <span class="bg-gray-800 px-2 py-1 rounded-lg text-sm border border-gray-700">
                                                        Modifier le: <?php echo e($post->updated_at->formatLocalized(' %d %B %Y')); ?> à <?php echo e($post->updated_at->format(' H : i')); ?>

                                                    </span>
                                                </p>
                                                <?php endif; ?>
                                                <p><?php echo e(Str::limit($post->contenus,500)); ?></p>
                                            </div>
                    
                                            <?php if($post->codesource): ?>
                                            <div class="p-4 border-t border-gray-700">
                                                <pre class="bg-gray-900 rounded-lg p-4 border border-indigo-500/20"><code class="<?php if($post->categorie_id==1): ?>language-csv <?php elseif($post->categorie_id==2): ?>language-css <?php elseif($post->categorie_id==3): ?>language-php <?php elseif($post->categorie_id==4): ?>language-javascript <?php elseif($post->categorie_id==5): ?>language-python <?php elseif($post->categorie_id==6): ?>language-java <?php endif; ?>"><?php echo e(Str::limit($post->codesource,300)); ?></code></pre>
                                            </div>
                                            <?php endif; ?>
                    
                                            <?php if($post->image): ?>
                                            <div class="p-4 border-t border-gray-700">
                                                <img src="<?php echo e($post->imageUrl()); ?>" class="w-full h-[300px] object-cover rounded-lg" alt="">
                                            </div>
                                            <?php endif; ?>
                    
                                            <div class="p-4 border-t border-gray-700">
                                                <div class="text-sm text-gray-400">
                                                    <?php if($post->category): ?>
                                                    <p class="mb-2">
                                                        Categorie: <strong class="text-indigo-400"><?php echo e($post->category?->titre); ?></strong>
                                                    </p>
                                                    <?php endif; ?>
                    
                                                    <?php if(!$post->tags->isEmpty()): ?>
                                                    <div class="flex flex-wrap gap-2 mb-2">
                                                        Tags:
                                                        <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                                                            <?php echo e($tag->nom); ?>

                                                        </span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php endif; ?>
                    
                                                    <p class="text-gray-500">Publié le: <?php echo e($post->updated_at->formatLocalized(' %d %B %Y')); ?></p>
                                                    <p class="text-gray-500">Créer par: <?php echo e($post->users->name); ?></p>
                                                    
                                                    <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre),'post'=>$post])); ?>" class="text-indigo-400 hover:text-indigo-300 transition-colors block mt-2">
                                                        Lire la suite
                                                    </a>

                                                    <a href="<?php echo e(route('user.modif',['post'=>$post])); ?>" class="text-indigo-400 hover:text-indigo-300 transition-colors block mt-2">
                                                        Modifier
                                                    </a>
                    
                                                    <p class="text-gray-500 mt-2">
                                                        <?php echo e($post->views_count); ?> <?php if($post->views_count>1): ?>vues <?php else: ?> vue <?php endif; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        <!-- Pagination -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                            <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 p-6">
                                <?php echo e($posts->appends(Request::except('page'))->links()); ?>

                            </div>
                        </div>

                        <?php elseif(request('demande')=="a"): ?>
<!-- Code pour les astuces -->
<!-- [Suite du code avec les mêmes principes de conversion] -->
                            <?php $__empty_1 = true; $__currentLoopData = $astuces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $astuce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <div class="py-2 mt-3">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 p-6">
                                    <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 transition-all duration-300 hover:border-indigo-500/40 hover:shadow-xl hover:shadow-indigo-500/20">
                                        <!-- Contenu Principal -->
                                        <div class="overflow-hidden">
                                            <div class="p-6 text-gray-200 prose prose-invert prose-indigo max-w-none" style="text-align: justify">
                                                <?php
                                                    echo $astuce->contenus
                                                ?>
                                            </div>
                                        </div>
                            
                                        <!-- Section État et Modification -->
                                        <div class="border-t border-indigo-500/20 p-4 mt-4">
                                            <?php if($astuce->etat == false): ?>
                                                <div class="bg-amber-500/10 border border-amber-500/20 rounded-lg p-4 mb-4">
                                                    <div class="flex items-center gap-3 text-amber-400">
                                                        <!-- Icône d'avertissement -->
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                        </svg>
                                                        
                                                        <span>Vous êtes le seul et les administrateurs à voir cette astuce avant sa validation</span>
                                                        
                                                        <!-- Animation de chargement -->
                                                        <div class="relative w-5 h-5">
                                                            <div class="absolute inset-0 border-2 border-amber-400 border-t-transparent rounded-full animate-spin"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                            
                                            <a href="<?php echo e(route('astuces.editastuce',['astuce'=>$astuce->id])); ?>" 
                                               class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300 group">
                                                Modifier
                                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 adrks:bg-gray-700">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <?php endif; ?>
                            <div class="mt-3">
                                <?php echo e($astuces->appends(Request::except('page'))->links()); ?>


                            </div>




                            <?php elseif(request('demande')==''): ?>
<div class="mt-3 p-6 bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 transition-all duration-300 hover:border-indigo-500/40">
    <div class="overflow-x-auto">
        <table class="w-full min-w-full divide-y divide-indigo-500/20">
            <thead>
                <tr class="bg-indigo-500/10">
                    <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Sujet</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Etat</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Visites</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-indigo-500/20 bg-gray-900/50">
                <?php $__empty_1 = true; $__currentLoopData = $postsbruillon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($post->etat == 1): ?>
                    <tr class="hover:bg-indigo-500/5 transition-colors duration-200">
                        <td class="px-6 py-4">
                            <div class="space-y-3">
                                <h4 class="text-lg font-semibold text-gray-200">
                                    <?php echo e($post->titre); ?>

                                </h4>
                                <div class="flex items-center space-x-4 text-gray-400">
                                    <span>Réactions</span>
                                    <div class="flex items-center space-x-2">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                        <span><?php echo e($post->reactions()->where('reaction', '1')->count()); ?></span>
                                        <i class="bi bi-hand-thumbs-down"></i>
                                        <span><?php echo e($post->reactions()->where('reaction', '0')->count()); ?></span>
                                    </div>
                                </div>
                                <div class="flex items-center text-gray-500">
                                    <i class="bi bi-clock-history mr-2"></i>
                                    <span>Mise à jour il y a : <?php echo e($post->duree); ?></span>
                                </div>
                                <div class="flex space-x-3">
                                    <a href="<?php echo e(route('user.modif',['post'=>$post->id])); ?>" 
                                       class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300">
                                        <i class="bi bi-pencil-square mr-2"></i>
                                        Editer
                                    </a>
                                    <a href="<?php echo e(route('user.show',['nom'=>$post->slug,'post'=>$post])); ?>"
                                       class="inline-flex items-center px-4 py-2 bg-gray-600/20 border border-gray-500 text-gray-400 rounded-lg hover:bg-gray-600 hover:text-white transition-all duration-300">
                                        <i class="bi bi-eye mr-2"></i>
                                        Voir
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <?php if($post->etat== false): ?>
                                <span class="px-3 py-1 text-sm font-medium bg-green-500/20 text-green-400 rounded-full">
                                    Publié
                                </span>
                            <?php elseif($post->etat ==true): ?>
                                <span class="px-3 py-1 text-sm font-medium bg-amber-500/20 text-amber-400 rounded-full">
                                    Non Publié
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-gray-400">
                            <div class="flex items-center space-x-1">
                                <i class="bi bi-eye"></i>
                                <span><?php echo e($post->views_count); ?></span>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" class="px-6 py-4">
                            <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4 text-red-400">
                                Aucune astuces pour l'instant
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <div class="bg-gray-900/50 rounded-lg p-4">
            <?php echo e($postsbruillon->appends(Request::except('page'))->links()); ?>

        </div>
    </div>
</div>
                                <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/dashboard.blade.php ENDPATH**/ ?>