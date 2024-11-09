  <?php $__env->startSection('section',"Moi"); ?>
  <?php $__env->startSection('titre',"Mon Compte"); ?>
  
<?php $__env->startSection('contenus'); ?>

<?php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
?>
<?php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
use Illuminate\Support\Str;

?>





<div class="row row-cols-1 row-cols-md-3 g-4">
    

   <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
   <!--div class="col">
    <div class="card h-100">
      <div  class="me-2" alt="...">
        <p><?php echo e($comm->post->id); ?></p>
      </div>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
       
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div-->
  <?php
  $titre= str_replace(' ','-',$comm->post->slug)
  ?>
  <div class="d-flex text-muted pt-3">
    <div class=" bd-placeholder-img flex-shrink-0 me-2 rounded mes bg-body" >

    </div>
    <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre),'post'=>$comm->post])); ?>"class="nav-link">
    <p class="pb-3 mb-0 small lh-sm border-bottom">
      <strong class="d-block text-body"> <?php echo e($comm->post->titre); ?> </strong>
      <?php echo e(Str::limit($comm->contenus,150)); ?>

    </p>
  </a>
  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
       
   <?php endif; ?>
  </div>
  <?php echo e($comments->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/user/mescome.blade.php ENDPATH**/ ?>