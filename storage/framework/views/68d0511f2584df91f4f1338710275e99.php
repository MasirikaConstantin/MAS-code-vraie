<?php $__env->startSection("titre","Tous les Posts"); ?>
<?php $__env->startSection('section','Toutes les publications'); ?>
<?php $__env->startSection('contenus'); ?>
<?php
use Illuminate\Support\Str;
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
?>

<!-- Formulaire de recherche -->
<div class="container mx-auto px-4 my-8">
    <form action="" method="get">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Titre -->
            <div class="relative group">
                <input type="text" name="titre" value="<?php echo e($input['titre']??''); ?>" 
                    class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label class="peer-focus:font-medium absolute text-sm text-gray-200 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Titre d'un post
                </label>
            </div>

           

            <!-- Contenus -->
            <div class="relative">
                <input type="text" name="contenus" value="<?php echo e($input['contenus'] ?? ''); ?>"
                    class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label class="peer-focus:font-medium absolute text-sm text-gray-200 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Par un contenus
                </label>
            </div>

            <!-- Catégories -->
            <div class="relative">
                <select name="category_id" onchange="this.form.submit()"
                    class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="">Selectionner une Catégorie</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(old('category_id', $input['category_id']?? '')== $category->id): echo 'selected'; endif; ?> value="<?php echo e($category->id); ?>">
                        <?php echo e($category->titre); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-200 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Par une catégories
                </label>
            </div>

            <!-- Bouton -->
            <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                Rechercher
            </button>
        </div>
    </form>

    <hr class="my-6">

    <!-- Liste des posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
            $titre = str_replace(' ','-',$post->slug)
        ?>
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl  shadow-sm overflow-hidden border border-gray-900">
            <div class="flex">
                <div class="flex-1 p-6">
                    <div class="text-indigo-600 font-semibold"><?php echo e($post->titre); ?></div>
                    <h3 class="mt-2 flex items-center text-gray-400">
                        <i class="bi bi-folder2-open mr-2"></i><?php echo e($post->category->titre); ?>

                    </h3>
                    <div class="text-sm text-gray-300 mt-2">
                        <?php echo e($post->created_at->formatLocalized(' %d %B %Y')); ?>

                        <p class="mt-1">Par : <?php echo e($post->user->name); ?></p>
                    </div>
                    <p class="mt-4 text-gray-100"><?php echo e(substr($post->contenus,0,200)); ?></p>
                    <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre),'post'=>$post])); ?>" 
                        class="mt-4 inline-block text-indigo-600 hover:text-indigo-700">
                        Lire la suite →
                    </a>
                </div>
                <div class="w-48 hidden lg:block">
                    <?php if($post->image): ?>
                    <img class="h-full w-full object-cover" src="<?php echo e($post->imageUrl()); ?>" alt="<?php echo e($post->titre); ?>">
                    <?php else: ?>
                    <div class="h-full w-full p-4">
                        <?php echo $post->category->svg; ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-span-2 bg-red-100 text-red-700 p-4 rounded-lg">
            Aucune publication ne correspond à votre recherche
        </div>
        <?php endif; ?>
    </div>

    <div class="mt-6">
        <?php echo e($posts->links()); ?>

    </div>

    <hr class="my-6">

    <!-- Catégories -->
    <h3 class="text-2xl font-bold mb-6">Trier les catégories</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="relative  bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl flex rounded-lg border border-5 border-<?php echo e($category->couleur); ?> overflow-hidden">
            <div class="w-1/4 p-4">
                <div class="w-full h-full">
                    <?php echo $category->svg; ?>

                </div>
            </div>
            <div class="flex-1 p-4">
                <h5 class="font-bold text-gray-100"><?php echo e($category->titre); ?></h5>
                <p class="mt-2 text-gray-200"><?php echo e(Str::limit($category->description,200)); ?> </p>
                <a href="<?php echo e(route('tous',['category_id' => $category->id])); ?>" 
                    class="mt-2 inline-block text-indigo-600 hover:text-indigo-700">
                    Lire la suite →
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<style>
.svg-container svg {
    width: 100%;
    height: 100%;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/masirika-constantin/Vidéos/Mas-Code/resources/views/user/tous.blade.php ENDPATH**/ ?>