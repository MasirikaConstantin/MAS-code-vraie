<?php $__env->startSection('section','Admin site'); ?>
<?php $__env->startSection('titre', 'AdminBase'); ?>
<?php $__env->startSection('contenus'); ?>
<?php
  $count1=0;
  $count="0";
?>
<?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>  
<?php endif; ?>
<h3>Categories</h3>
<a  class="btn btn-link" href="<?php echo e(route('admin.adminastuce')); ?>">Les astuces</a>
<ul class="nav col-md justify-content-end">
  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
    $count1=$count++."A";
  ?>
  <li class="nav-item me-2 mt-2 "> <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($count1); ?>" ><?php echo e($cat->titre); ?> </button>    </li>


<div class="modal fade" id="exampleModal<?php echo e($count1); ?>"   tabindex="-1" aria-labelledby="exampleModalLabel<?php echo e($count1); ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <div class="card-group">
         
          <div class="carsd">
            <p>Titre :  <strong><?php echo e($cat->titre); ?></strong></p>
            <p>Description : <strong><?php echo e($cat->description); ?></strong></p>

              Date de publication : <strong><?php echo e($cat->created_at->formatLocalized(' %d %B %Y')); ?></strong>
              <?php if($cat->created_at != $cat->updated_at): ?>
              <p>Modifé le : <strong> <?php echo e($cat->updated_at->formatLocalized(' %d %B %Y')); ?></strong></p>

            
            <?php endif; ?>
            <?php if($cat->image): ?>
            <div class="col-lg-4">
              <a class="test-popup-link " href="<?php echo e($cat->imageUrlcat()); ?>">
                <button class="btn" data-bs-dismiss="modal"><img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="<?php echo e($cat->titre); ?>" width="140" height="140" src="<?php echo e($cat->imageUrlcat()); ?>" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
                </button>
              </a>
              
            </div>
            <?php endif; ?>
            
            <div>
              <a class="btn btn-outline-primary me-4" href="<?php echo e(route("admin.editcat",['id'=>$cat->id])); ?>">Editer</a>
              <a class="btn btn-outline-danger" href="<?php echo e(route("admin.deletecat",['id'=>$cat->id])); ?>">Supprimer</a>

            </div>

          </div>
          
        </div>


      </div>
      
    </div>
  </div>
</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <li class="nav-item me-2 mt-2"> <a  class="btn btn-outline-primary" href="<?php echo e(route("admin.newcat")); ?>">Créer une category</a>    </li>

</ul>

<hr class="my-4">





<h3>Tags</h3>






<ul class="nav col-md justify-content-end">
  
  <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php
    $count++;
  ?>
  <li class="nav-item me-2 mt-2"> <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($count); ?><?php echo e($tag->id); ?>" ><?php echo e($tag->nom); ?> </button>    </li>


<div class="modal fade" id="exampleModal<?php echo e($count); ?><?php echo e($tag->id); ?>"   tabindex="-1" aria-labelledby="exampleModalLabel<?php echo e($count); ?><?php echo e($tag->id); ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <div class="card-group">
          
          <div class="carsd">
            <p>Titre :  <strong><?php echo e($tag->nom); ?></strong></p>
            <p>Couleur :
              <span class="badge bg-<?php echo e(!is_null($tag->couleur) ? $tag->couleur : 'white'); ?> ">
              <?php echo e($tag->nom); ?> 
          </span>

        </p>

              Date de publication : <strong><?php echo e($tag->created_at->formatLocalized(' %d %B %Y')); ?></strong>
              <?php if($tag->created_at != $tag->updated_at): ?>
              <p>Modifé le : <strong> <?php echo e($tag->updated_at->formatLocalized(' %d %B %Y')); ?></strong></p>

            
            <?php endif; ?>
            <?php if($tag->image): ?>
          
            <?php endif; ?>
            
            <div>
              <a class="btn btn-outline-primary me-4" href="<?php echo e(route("admin.edittag",['id'=>$tag->id])); ?>">Editer</a>

            </div>

          </div>
          
        </div>


      </div>
      
    </div>
  </div>
</div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <li class="nav-item me-2 mt-2 "> <a  class="btn btn-outline-primary" href="<?php echo e(route("admin.newtag")); ?>">Créer un Tag</a>    </li>

</ul>

<hr class="my-4">

    
<?php echo e(Auth::user()->name); ?>






















<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
      
        <div class="card border-light mb-3" style="max-width: 12rem;">
          <div class="card-header">Nombre de posts</div>
          <div class="card-body">
            <div class="stats-item d-flex align-items-center text-center">
              <h1 data-purecounter-start="0" data-purecounter-end='<?php echo e($posts->count()); ?>' data-purecounter-duration="1" class="purecounter text-center"></h1>
            </div>
          </div>
        </div>

      </div>
      
      
    </div>
  </div>
</div>



<script src="<?php echo e(asset('purecounter_vanilla.js')); ?>"></script>
<script>
    new PureCounter();
</script>

<div class="mt-3">
<h3>Les utilisateurs</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Date</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
      <th scope="row"><?php echo e($item->id); ?></th>
      <td><?php echo e($item->name); ?></td>
      <td><?php echo e($item->created_at->formatLocalized(' %d %B %Y')); ?></td>
      <td><?php echo e($item->email); ?></td>
      <td>
        <?php if($item->image!=null): ?>
      <a class="test-popup-link " href="<?php echo e($item->imageUrls()); ?>">
        <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="<?php echo e($item->name); ?>" width="80" height="80" src="<?php echo e($item->imageUrls()); ?>" style="object-fit: cover" />

      </a>
        
      <?php else: ?>
      <img class="bd-placeholder-img rounded-circle" width="80" height="80" src="<?php echo e(asset('téléchargement.png')); ?>" />
      <?php endif; ?>
      </td>

    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
    
  </tbody>
</table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>