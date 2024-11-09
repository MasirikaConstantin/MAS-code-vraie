<?php $__env->startSection('section','Admin Astuce'); ?>
<?php $__env->startSection('titre', 'Admin Astuce'); ?>
<?php $__env->startSection('contenus'); ?>




<?php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
?>
<?php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

?>
<style>
      .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: auto;
    height: 60px;
  }
  @media (max-width: 500px){
        
        .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border: 3px solid #0e0c0cc4;
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: auto;
    height: 100px;
  }}
</style>

<div class="row g-5" >





    <div class="col-md-12 col-lg-8" >
    




        <div class=" mb-4  py-3" style="text-align: justify">

            <div class="container mb-4 vw-100">
                <!--iframe src="https://www.youtube.com/embed/HUHL2f3EpHY?si=X5MbA0Vy-LSQNost" title="YouTube video" allowfullscreen></iframe-->
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
            </div>
        </div>


    </div>


    
    <div class="col-md-5 col-lg-4 ">
    
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-body"><strong>Action</strong> </span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <p class="my-0"><strong>Etat</strong></p>
            
                      
                    <small class="text-muted"> <?php echo e($astuce->etat==1 ? 'Astuce accepté' :'En attente de votre validation'); ?></small>

                 
                </div>
                <span class="badge <?php echo e($astuce->etat==1 ? 'bg-success' :'bg-warning'); ?> text-center py-3"><?php echo e($astuce->etat==1 ? 'Posté' :'En attente'); ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <p>Mise à jour il y a :   <strong><?php echo e($maduree); ?></strong> </p>

              </li>

        </ul>
        <?php if($astuce->etat==0): ?>
            <div class="alert alert-success">
                <strong class="me-3" >Action</strong>
                <a href="<?php echo e(route('admin.gereredit',['astuce'=>$astuce->id, 'donnee'=>1])); ?>" class="btn btn-primary"> Mettre en ligne</a>
            </div>
        <?php else: ?>
        <div class="alert alert-danger ">
            <strong class="me-5" >Action</strong>
            
            <a href="<?php echo e(route('admin.gereredit',['astuce'=>$astuce->id,'donnee'=>0])); ?>" class="btn btn-primary end-0">Mettre en attente</a>
        </div>
            
        <?php endif; ?>
        <?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>  
<?php endif; ?>
        
    </div>







</div>
        
          
</div>

</div>

  </div>

  


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/admin/gerer.blade.php ENDPATH**/ ?>