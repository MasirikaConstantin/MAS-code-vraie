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

?>

<style>
  @media (max-width: 500px){
      th{
          padding-bottom:0px !important  ;
        font-size: 12px;

      }
      th .h4{
        font-size: 22px;
      }
      th p{
        font-size: 12px;
      }
      .s{

      margin: .15rem !important;
      font-size: .8rem !important;
    
      }
      *, ::after, ::before {
     box-sizing:inherit !important; 
}
            }
</style>
<div class="row g-4 py-5 row-cols-1 row-cols-lg-2" >
  <div class="col-lg-4 ">
    <div class="col-lg-4">
      
      <?php if(Auth::user()->image!=null): ?>
      <a class="test-popup-link " href="<?php echo e($user->imageUrls()); ?>">
        <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="<?php echo e($user->name); ?>" width="140" height="140" src="<?php echo e($user->imageUrls()); ?>" style="object-fit: cover" />

      </a>
        
      <?php else: ?>
      <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="<?php echo e(asset('téléchargement.png')); ?>" />
      <?php endif; ?>
    </div>
    <?php if(auth()->guard()->check()): ?>
    
  <?php if(Auth::user()==$user): ?>
  <?php else: ?>
      <?php if($ubs->count() > 0): ?>
      <span class="badge bg-success">Abonné</span>
        <p class="mt-2">
          <a href="<?php echo e(route('user.unsubscribe',['user'=>$user])); ?>" class="btn btn-outline-primary btn-sm" > Se désabonner</a>
        </p>
        
      <?php else: ?>
      <p class="mt-2 py-3" >
        <a href="<?php echo e(route('user.subscribe',['user'=>$user])); ?>" class="btn btn-primary" > S'abonner</a>
      </p>
      <?php endif; ?>
<?php endif; ?>
    <?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
  <div class="alert alert-warning mt-2">
    <a href="<?php echo e(route('login')); ?>">Connectez vous</a> ou <a href="<?php echo e(route('register')); ?>">créer un compte</a> pour s'abonner   
  </div>
<?php endif; ?>

    <hr>


  <ul class="nav flex-column">
    <li class="nav-item"> Nom: <strong><?php echo e($user->name); ?></strong> </li>
    <li class="nav-item"> Adresse mail: <strong><?php echo e($user->email); ?></strong> </li>
    <li class="nav-item"> Nombre d'abonné: <strong><?php echo e($user->subscribers()->count()); ?></strong> </li>
    <li class="nav-item"> Nombre des posts: <strong><?php echo e($user->posts()->count()); ?></strong> </li>
    <li class="nav-item"> Nombre des commentaires: <a href="<?php echo e(route('user.comments', $user)); ?>"><strong><?php echo e($user->com()->count()); ?></strong> </a></li>
    
    
    
    <li class="nav-item"> <a href="<?php echo e(route('profile.edit')); ?>"> Modifier mes informations </a></li>
    <li class="nav-item">
      
    
      <div class="dropdown bg-body text-body mt-2">
        <button class="btn btnhover dropdown-toggle text-body" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <strong>Créer</strong>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="<?php echo e(route('astuces.new')); ?>"> Astuce</a></li>
          <li><a class="dropdown-item" href="<?php echo e(route('user.newpost')); ?>"> <i class="bi bi-patch-question"></i>  Post </a></li>
        </ul>
      </div>
    
    </li>



    
  </ul>

  </div>
<div class="col-lg-6">

  <a class="bouto1"  href="?demande">Brouillon</a>
  <a class="bouto1"  href="?demande=q">Mes Questions</a>
  <a class="bouto1" href="?demande=a">Mes Astuces</a>


  <?php if(request('demande')=="q"): ?>
    

        
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $titre= str_replace(' ','-',$post->slug);

    ?>
        <div class="py-2 mt-3 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border rounded-3 position-relative">
                <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                      <form method="POST" action="<?php echo e(route('user.posts.update', $post)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                    
                            <div class="row">
                              <div class="col-sm-4">
                              <div class="form-check form-switch mt-2">
                                <input type="hidden" name="etat" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="etat" value="1" <?php echo e($post->etat == 1 ? "checked" : ""); ?>>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Masqué</label>
                            </div>
                              </div>
                    <div class="col-sm-4 mb-2">
                      <button class="btn btn-outline-primary" type="submit">Mettre à jour</button>

                    </div>
                            </div>
                         
                        
                    </form>
                        <ul class="list-group" >
                            <li class="list-group-item" >
                              
                              <strong><?php echo e($post->titre); ?></strong>  <p><a href="<?php echo e(route('user.modif',['post'=>$post->id])); ?>">Modifier</a>

                              </p> </li>
                            <li class="list-group-item" >
                              <?php if($post->created_at != $post->updated_at): ?>
                              <p>
                                <i class="bi bi-exclamation-triangle"></i>  <span class="badge bg-secondary" > Modifier le: <?php echo e($post->updated_at->formatLocalized(' %d %B %Y')); ?> à <?php echo e($post->updated_at->format(' H : i')); ?> </span>
                              </p>
                                
                              <?php endif; ?>
                                <?php echo e($post->contenus); ?>

                          

                            </li class="list-group-item" >
                            <?php if($post->codesource): ?>
                                    <pre style="" class="border border-5  " ><code class="b <?php if($post->categorie_id==1): ?>language-csv <?php elseif($post->categorie_id==2): ?>language-css <?php elseif($post->categorie_id==3): ?>language-php <?php elseif($post->categorie_id==4): ?>language-javascript <?php elseif($post->categorie_id==5): ?>language-python <?php elseif($post->categorie_id==6): ?>language-java <?php endif; ?>"><?php echo e(($post->codesource)); ?></code></pre>
                            <?php endif; ?>
                        
                          
                            <?php if($post->image): ?>
                            <li class="list-group-item"> <img src="<?php echo e($post->imageUrl()); ?>" style="height:220px ; width: 100% ; height: 300px; object-fit: cover " alt="" srcset=""></li>
                                
                            <?php endif; ?>
                          <li class="list-group-item" >

                            <p class="small" > 
                                <?php if($post->category): ?>

                                Categorie : 
                                <strong>
                                <?php echo e($post->category ?->titre); ?>


                                </strong>
                                <?php endif; ?>
                                <br> 
                                <?php if(!$post->tags->isEmpty()): ?>
                                    Tags : 
                                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-<?php echo e($tag->couleur); ?>">
                                        <?php echo e($tag->nom); ?> 
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              
                            <p class="text-muted" >Publié le   : <?php echo e($post->updated_at->formatLocalized(' %d %B %Y')); ?> </p>
                              
                            <p class="text-muted" >Créer par  : <?php echo e($post->users->name); ?> </p>
                              
                                <a href="<?php echo e(route('user.show',['nom'=>Str::lower($titre),'post'=>$post])); ?>" class="icon-link gap-1 icon-link-hover stretched-link" >Lire la suite</a>
                            </p> 
                           
                      <p><small> <?php echo e($post->views_count); ?>   <?php if($post->views_count>1): ?>vues <?php else: ?> vue <?php endif; ?></small></p>
                    </li>


                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>

     



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <?php echo e($posts->appends(Request::except('page'))->links()); ?>

            
        </div>
        </div>
    </div>


  <?php elseif(request('demande')=="a"): ?>
    
      <?php $__empty_1 = true; $__currentLoopData = $astuces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $astuce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="py-2 mt-3 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border border-3 rounded-3 position-relative">
            <div class="bg-body  overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900  "  style="text-align: justify">
                  <?php
                      echo $astuce->contenus
                    ?>
                </div>
                
              </div>
              <div class="border border-2 rounder-2 p-2">
                <?php if($astuce->etat == false): ?>
                  <div class="alert alert-warning">
                    Vous êtes le seul et les administrateur à voir cette astuce avant sa validation par les administrateurs
                    <div class="spinner-border spinner-border-sm" role="status">
                      
                    </div>
                    
                  </div>
                <?php endif; ?>
                <a class=" stretched-link" href="<?php echo e(route('astuces.mesastuces',['nom'=>$astuce->slug,'astuce'=>$astuce->id])); ?>">modifier</a>

                </div>
          </div>
      </div>


      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <div class="alert alert-danger mt-2">
              Aucune astuces pour l'instant
          </div>
      <?php endif; ?>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
          <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <?php echo e($astuces->appends(Request::except('page'))->links()); ?>

              </div>
          </div>
        </div>
  <?php elseif(request('demande')==''): ?>
          <div class="shadow-lg p-3 mb-5 bg-body  mt-3 border border-info border-3 rounded-3">
            <div class="">
            

            <table class="table table-striped table-hover border">
              <thead>
                <tr>
                  <th scope="col" style="padding-bottom:20px !important ">Sujet</th>
                  <th scope="col" style="padding-bottom:20px !important ">Etat</th>
                  <th scope="col" style="padding-bottom:20px !important ">Visites</th>
                  
                </tr>
              </thead>
              <tbody>
                  
                <?php $__empty_1 = true; $__currentLoopData = $postsbruillon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($post->etat == 1): ?>
                  
                    <tr>
                      <th scope="row">
                      <div style="position: relative" >
                        <p class="h4" >
                          <?php echo e($post->titre); ?>

                        </p>
                        <p>
                          Réactions
                          <i class="bi bi-hand-thumbs-up s"></i> <?php echo e($post->reactions()->where('reaction', '1')->count()); ?> & <i class="bi bi-hand-thumbs-down s"></i> <?php echo e($post->reactions()->where('reaction', '0')->count()); ?>

                        </p>
                        <p class="text-muted" >
                          <i class="bi bi-clock-history s"></i> Mise à jour il y a  : <?php echo e($post->duree); ?>

                        </p>



                        
                        <a class="btn  shadow-lg p-1 bg-body me-2 " href="<?php echo e(route('user.modif',['post'=>$post->id])); ?>">
                          <i class="bi bi-pencil-square me-2"></i> <strong> Editer</strong>
                        </a>
                        <a class="btn  shadow-lg p-1 bg-body" style="border: 1px rgb(136, 94, 94) solid" href="<?php echo e(route('user.show',['nom'=>$post->slug,'post'=>$post])); ?>">
                          <i class="bi bi-eye  me-1 " style="margin-left: 12px !important " ></i>  <strong>Voir</strong>
                        </a>
                      </div>
                      </th>
                      <td>
                        <?php if($post->etat== false): ?>
                        <span class="badge bg-success" >Publié</span>
                        <?php elseif($post->etat ==true): ?>
                        <span class="badge bg-warning" >Non Publié</span>
                        <?php endif; ?>
                      </td>
                      <td> <i class="bi bi-eye s"></i> <?php echo e($post->views_count); ?> </td>
                    </tr>
                <?php endif; ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="alert alert-danger">
                  Aucune astuces pour l'instant
              </div>
                <?php endif; ?>

              
              </tbody>
            </table>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
              <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                    <?php echo e($postsbruillon->appends(Request::except('page'))->links()); ?>

              
                </div>
                </div>
            </div>

                </div>


              </div>
  <?php endif; ?>


</div>

</div>

  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/extends.blade.php ENDPATH**/ ?>