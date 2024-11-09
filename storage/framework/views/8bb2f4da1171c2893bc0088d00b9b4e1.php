<?php $__env->startSection('contenus'); ?>

<main class="flex-1 mt-20 bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="border-b border-violet-600/30 pb-4 mb-8">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-200 to-pink-200">
                Poser une Question
            </h1>
        </div>

        <form method="post" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <!-- Switch -->
            <div class="flex items-center space-x-3">
                <label class="text-violet-200" for="flexSwitchCheckChecked">Désactiver</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="etat" value="1" class="sr-only peer" <?php echo e($post->etat == 1 ? "checked" : ""); ?>

                           id="flexSwitchCheckChecked">
                    <div class="w-11 h-6 bg-gray-700 peer-focus:ring-4 peer-focus:ring-violet-500/50 rounded-full peer 
                               peer-checked:after:translate-x-full peer-checked:bg-violet-600 after:content-[''] after:absolute 
                               after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 
                               after:transition-all"></div>
                </label>
            </div>
            <?php $__errorArgs = ["etat"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!-- Title Input -->
            <div class="relative">
                <input type="text" name="titre" value="<?php echo e(old('titre', $post->titre)); ?>" 
                       class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg 
                              focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white placeholder-gray-400"
                       placeholder="Titre *">
            </div>
            <?php $__errorArgs = ["titre"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <input type="text" value="<?php echo e(Auth::user()->id); ?>" name="user_id" hidden>

            <!-- Category Select -->
            <select name="categorie_id" required
                    class="w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg text-white
                           focus:ring-2 focus:ring-violet-500 focus:border-transparent">
                <option selected value="">Sélectionner la catégorie</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if(old('categorie_id', $post->categorie_id)== $l->id): echo 'selected'; endif; ?> value="<?php echo e($l->id); ?>">
                        <?php echo e($l->titre); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ["categorie_id"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!-- Tags Select -->
            <?php
                $tagsId=($post->tags()->pluck('id'));
            ?>
            <select name="tags[]" multiple
                    class="w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg text-white
                           focus:ring-2 focus:ring-violet-500 focus:border-transparent">
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($tagsId->contains($ll->id)): echo 'selected'; endif; ?> value="<?php echo e($ll->id); ?>"><?php echo e($ll->nom); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ["tags"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <!-- Image Upload -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-violet-200">Photo (si possible)</label>
                    <input type="file" name="image" id="fileUpload"
                           class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0 file:text-sm file:font-semibold
                                  file:bg-violet-600 file:text-white hover:file:bg-violet-700
                                  cursor-pointer border rounded-lg">
                </div>
                <div class="relative h-48 bg-gray-800/50 rounded-lg overflow-hidden">
                    <img id="imageDiv" src="<?php if($post->image): ?><?php echo e($post->imageUrl()); ?><?php endif; ?>" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Content Textareas -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-violet-200">Votre Message</label>
                    <textarea name="contenus" rows="10"
                              class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg
                                     focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white"><?php echo e(old('contenus', $post->contenus)); ?></textarea>
                    <?php $__errorArgs = ["post"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="space-y-2">
                    <label class="text-violet-200">Code Source</label>
                    <textarea name="codesource" rows="10"
                              class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg
                                     focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white"><?php echo e($post->codesource); ?></textarea>
                    <?php $__errorArgs = ["codesource"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="bg-red-900/50 text-red-200 p-3 rounded-lg"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 
                           hover:to-purple-700 text-white font-medium rounded-lg transform hover:scale-105 
                           transition-all duration-300 shadow-lg hover:shadow-violet-500/50">
                Publier
            </button>
        </form>
    </div>

    <script>
        new TomSelect('select[multiple]',{plugins:{remove_button: {title: 'Delacher'}}})
    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <script>
        document.getElementById('fileUpload').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imageDiv').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/user/modifier.blade.php ENDPATH**/ ?>