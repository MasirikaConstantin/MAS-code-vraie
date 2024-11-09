<?php $__env->startSection('section','Toutes les astuces'); ?>
<?php $__env->startSection('titre','Astuces'); ?>

<?php $__env->startSection('contenus'); ?>
    <div class="max-w-7xl mx-auto">
        <!-- Bouton Publier -->
        <a href="<?php echo e(route('astuces.new')); ?>"
           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg text-white font-medium shadow-lg hover:shadow-purple-500/25 transform hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Publier une astuce
        </a>

        <!-- Formulaire de recherche -->
        <form action="" method="get" class="mt-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="relative">
                    <input type="text" name="titre" value="<?php echo e($input['titre']??''); ?>"
                           class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all"
                           placeholder="Titre d'une astuce">
                </div>

                <div class="relative">
                    <input type="text" name="contenus" value="<?php echo e($input['contenus'] ?? ''); ?>"
                           class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all"
                           placeholder="Rechercher dans le contenu">
                </div>

                <div class="relative">
                    <select name="category_id" onchange="this.form.submit()"
                            class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all">
                        <option value="">Sélectionner une catégorie</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $input['category_id']?? "") == $category->id): echo 'selected'; endif; ?>>
                                <?php echo e($category->titre); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button class="h-12 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg hover:shadow-lg hover:shadow-purple-500/25 transform hover:scale-105 transition-all">
                    Rechercher
                </button>
            </div>
        </form>

        <!-- Liste des astuces -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <?php $__empty_1 = true; $__currentLoopData = $astuces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $astuce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-gray-800/30 backdrop-blur-xl rounded-xl overflow-hidden shadow-xl hover:shadow-purple-500/10 transition-all">
                    <div class="flex flex-col md:flex-row">
                        <div class="p-6 flex-1">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">
                                    <?php echo e($astuce->category->titre); ?>

                                </span>
                                <span class="text-gray-400 text-sm">
                                    <?php echo e($astuce->created_at->formatLocalized(' %d %B %Y')); ?>

                                </span>
                            </div>
                           
                            <h3 class="text-xl font-bold text-white mb-2"><?php echo e($astuce->titre); ?></h3>
                            <p class="text-gray-400 mb-4">Par <?php echo e($astuce->users->name); ?></p>
                            <p class="text-gray-300 mb-4"><?php echo e(Str::limit($astuce->contenus, 200)); ?></p>
                           
                            <a href="<?php echo e(route('astuces.shoastuce',['nom'=>$astuce->slug,'astuce'=>$astuce->id])); ?>"
                               class="text-purple-400 hover:text-purple-300 transition-colors">
                                Lire la suite →
                            </a>
                        </div>

                        <div class="w-full md:w-48 h-48 relative">
                            <?php if($astuce->image): ?>
                                <img src="<?php echo e($astuce->imageUrlAstuce()); ?>"
                                     class="w-full h-full object-cover"
                                     alt="<?php echo e($astuce->titre); ?>">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gray-800">
                                    <?php echo $astuce->category->svg; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-2 bg-red-500/10 text-red-400 p-4 rounded-lg">
                    Aucune publication ne correspond à votre recherche
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            <?php echo e($astuces->links()); ?>

        </div>

        <!-- Catégories -->
        <h3 class="text-2xl font-bold text-white mt-12 mb-6">Trier les catégories</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-gray-800/30 backdrop-blur-xl rounded-xl overflow-hidden hover:shadow-xl transition-all">
                    <div class="flex p-4">
                        <?php if($category->image): ?>
                            <img src="<?php echo e($category->imageUrlcat()); ?>"
                                 class="w-24 h-24 object-cover rounded-lg"
                                 alt="<?php echo e($category->titre); ?>">
                        <?php else: ?>
                            <div class="w-24 h-24 flex items-center justify-center">
                                <?php echo $category->svg; ?>

                            </div>
                        <?php endif; ?>

                        <div class="ml-4 flex-1">
                            <h4 class="text-lg font-semibold text-white mb-2"><?php echo e($category->titre); ?></h4>
                            <p class="text-gray-400 text-sm mb-4"><?php echo e(Str::limit($category->description, 200)); ?></p>
                            <a href="<?php echo e(route('astuces',['category_id' => $category->id])); ?>"
                               class="text-purple-400 hover:text-purple-300 transition-colors">
                                En savoir plus →
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/astuces/astuces.blade.php ENDPATH**/ ?>