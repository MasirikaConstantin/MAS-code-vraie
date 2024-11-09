<?php $__env->startSection('titre', Str::substr($astuce->titre,0,20)); ?>
<?php $__env->startSection('section',($astuce->titre)); ?>
<?php $__env->startSection('contenus'); ?>
    



<?php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
?>
<?php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

?>

        <div class="card mb-4 container py-3" style="overflow: hidden;">

  <div class="container mb-4 vw-100" style="overflow: hidden;" >
    <!--iframe src="https://www.youtube.com/embed/HUHL2f3EpHY?si=X5MbA0Vy-LSQNost" title="YouTube video" allowfullscreen></iframe-->
<!--iframe width="560" height="315" src="<?php echo e(asset('Ouvrir et afficher les éléments d\'un fichier CSV, Gestion des fichiers en PHP CSV.mp4')); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe-->
<?php if($astuce->video): ?>
<iframe width="560"  height="315" src="<?php echo e($astuce->video); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<?php elseif($astuce->image): ?>
    <div class="col-sm-6 mb-3 mb-sm-0" style="overflow: hidden;" >
<img src="<?php echo e($astuce->imageUrlAstuce()); ?>" class="img-fluid rounded mx-auto d-block" width="100%"  height="auto" alt="">

    </div>
<?php endif; ?>
  </div>
<!--iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/HUHL2f3EpHY?si=JIUVrz6B3VS2msFM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe-->
            <?php
                echo $astuce->contenus
            ?>
              <div class="card py-3 me-3 container">
                <p>
                  Categorie : <strong><?php echo e($astuce->category->titre); ?></strong>

                </p>
                <p>
                  Tags : 

                  <?php $__currentLoopData = $astuce->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge bg-<?php echo e($tag->couleur); ?> warning ">
                                    <?php echo e($tag->nom); ?> 
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
                <?php if($astuce->video): ?>
                <p>
                  Lien : <?php echo e($astuce->video); ?>

                </p>
                <?php endif; ?>
                <a class="stretched-link " href="<?php echo e(route('astuces.editastuce',['astuce'=>$astuce->id])); ?>">modifier</a>
    
                </div>
        </div>
          
</div>

</div>

  </div>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/astuces/mesastuces.blade.php ENDPATH**/ ?>