<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="<?php echo e(asset('color-modes.js')); ?>"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?php echo $__env->yieldContent('titre' ,env("APP_NAME")); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="<?php echo e(asset('prism.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('bootstrap-icons/bootstrap-icons.css')); ?>">
<link rel="shortcut icon" href="<?php echo e(asset('mas-product.ico')); ?>" type="image/x-icon">
<link rel="stylesheet" href="<?php echo e(asset('quill.snow.css')); ?>">
<script src="<?php echo e(asset('quill.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('tom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('autre.css')); ?>">


<script src="<?php echo e(asset('fancybox.umd.js')); ?>"></script>
<link
  rel="stylesheet"
  href="<?php echo e(asset('fancybox.css')); ?>"
/>

<script src="<?php echo e(asset('tom-select.complete.min.js')); ?>"></script>


<meta name="theme-color" content="#712cf9">


            <style>
                    
                      @font-face {
                        font-family: 'Google';
                        src: url('<?php echo e(asset('ProductSans-Light.ttf')); ?>');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google';
                    }
                    

                  .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
                  }

                  @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                      font-size: 3.5rem;
                    }
                  }

                  .b-example-divider {
                    width: 100%;
                    height: 3rem;
                    background-color: rgba(0, 0, 0, .1);
                    border: solid rgba(0, 0, 0, .15);
                    border-width: 1px 0;
                    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
                  }

                  .b-example-vr {
                    flex-shrink: 0;
                    width: 1.5rem;
                    height: 100vh;
                  }

                  .bi {
                    vertical-align: -.125em;
                    fill: currentColor;
                  }

                  
                  .btn-bd-primary {
                    --bd-violet-bg: #712cf9;
                    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                    --bs-btn-font-weight: 600;
                    --bs-btn-color: var(--bs-white);
                    --bs-btn-bg: var(--bd-violet-bg);
                    --bs-btn-border-color: var(--bd-violet-bg);
                    --bs-btn-hover-color: var(--bs-white);
                    --bs-btn-hover-bg: #6528e0;
                    --bs-btn-hover-border-color: #6528e0;
                    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                    --bs-btn-active-color: var(--bs-btn-hover-color);
                    --bs-btn-active-bg: #5a23c8;
                    --bs-btn-active-border-color: #5a23c8;
                  }

                  .bd-mode-toggle {
                    z-index: 1500;
                  }

                  .bd-mode-toggle .dropdown-menu .active .bi {
                    display: block !important;
                  }
                  

            </style>

    
   
  </head>

  <body class="bg-gray-900 text-gray-100">
    
    <?php
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
                            
?>

<script>
  Fancybox.bind("[data-fancybox]", {
  // Your custom options
  });

</script>
   

<?php
  $route =request()->route()->getName();
?>

    

<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<style>

      .class {
        background-attachment: fixed !important;
          width: 100%;
          height: 80vh;
          background-size: cover;
          position:relative;
          margin-top: -80px;
          z-index: 9;
          background: url(<?php echo e(asset('imagde.svg')); ?>)  ;
        
          }
        
          .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(225, 255, 0) !important;
              text-shadow: (12px 12px 12px #000000);
              font-family: 'ubuntu', sans-serif;
              font-size: 28px !important;
              font-style: italic;
              font-display:red; 

            }
            .h1{
              font-size: 80px !important;
              letter-spacing: 0.2em;

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }


          .accs{
            padding-top: 300px!important
          }
          @media (max-width: 992px) {
          
            }

          @media (max-width: 500px){
            .sss{
              color: rgb(208, 255, 0) !important;
              margin: 140px 0px !important;
              padding: 0px;
              
            }
            .h1{
              font-size: 50px !important;
              letter-spacing: 0.2em;
            }
            .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(213, 216, 27, 0.678) !important;
              text-shadow: (12px 12px 12px #000000);
              text-align: center;
              font-family: 'ubuntu', sans-serif;
              font-size: 18px !important;
              font-style: italic;
              font-display:red; 

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }

          
        }


        
</style>
<!-- Begin page content -->
<main class="flex-shrink-0 mt-6 ">

      <?php if(str_contains($route, 'index')): ?>
        <div class="class "  >
            <?php if($route != 'astuces.new'): ?>
            <div class="  accs" style=" " >
                <?php endif; ?>
                  <div class="col-md-12">
                    <div class=" sss text-body  justify-content-center acc mt-3 ">
                      <h1 class="h1 text-body" >
                        <strong>Bienvenu  </strong>
                      </h1>
                      <h3 class="" id="monElement" >
                        
                      </h3>
                    </div>
                  
                  </div>
              </div>
            </div>
            <?php endif; ?>

          <?php if($route != 'astuces.new'): ?>
            
            <div class=" container mx-auto mt-6">
          <?php endif; ?>

      <div class="mt-6" style="margin-top: 90px" >
        <h1 class="text-4xl font-bold adrks:text-white mt-6 mb-4"><?php echo $__env->yieldContent('section',''); ?>   </h1>
      </div>

      <?php if(session("success1")): ?>

      <div id="successAlert" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 adrks:bg-gray-800 adrks:text-green-400 adrks:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success alert!</span> <?php echo e(session('success')); ?>

          <button type="button" onclick="this.parentElement.remove()" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 adrks:bg-green-600 adrks:hover:bg-green-700 adrks:focus:ring-green-800">X</button>
        </div>
      </div>
      
      <?php endif; ?>


          <?php echo $__env->yieldContent('contenus'); ?>


</main>
<div class="contaisner mx-auto">
  <footer class="bg-gradient-to-b from-gray-900 to-black py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- À propos -->
            <div class="md:col-span-5">
                <div class="space-y-4">
                    <h3 class="text-indigo-400 font-bold flex items-center">
                        <i class="bi bi-info-circle mr-2"></i> À propos
                    </h3>
                    <div class="text-gray-400">
                        Bienvenue sur <a href="/" class="text-2xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500"><?php echo e(__("mon-site")); ?></a> !
                        <p class="mt-2">Nous sommes une plateforme en ligne dédiée à fournir des réponses claires et précises à vos questions, quelle que soit leur domaine.</p>
                    </div>
                    <button type="button" class="text-indigo-400 hover:text-indigo-300" onclick="document.getElementById('aboutModal').classList.remove('hidden')">
                        En savoir plus →
                    </button>
                </div>

                
            </div>

            <!-- Modal -->
            <div id="aboutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-gray-900 rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-4">
                            <h5 class="text-xl font-bold text-indigo-400">
                                <i class="bi bi-info-circle mr-2"></i> À propos
                            </h5>
                            <button onclick="document.getElementById('aboutModal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="mt-6 text-gray-300 space-y-6">
                            <div>
                                <p class="font-bold mb-2">À propos de nous : Votre guichet unique pour les questions et les réponses</p>
                                <p>Bienvenue sur <span class="text-2xl text-indigo-400"><?php echo e(__("mon-site")); ?></span> !</p>
                            </div>

                            <div>
                                <p class="font-bold mb-2">Notre mission :</p>
                                <ul class="list-disc pl-5 space-y-2">
                                    <li>Offrir un espace ouvert et convivial où chacun peut poser des questions et obtenir des réponses de qualité.</li>
                                    <li>Favoriser le partage de connaissances et l'apprentissage continu dans une variété de domaines.</li>
                                    <li>Cultiver une communauté inclusive et respectueuse où chacun se sent à l'aise pour s'exprimer et apprendre.</li>
                                </ul>
                            </div>

                            <div>
                                <p class="font-bold mb-2">Ce qui nous distingue :</p>
                                <ul class="list-disc pl-5 space-y-2">
                                    <li><span class="font-semibold">Diversité des sujets:</span> Nous abordons un large éventail de sujets.</li>
                                    <li><span class="font-semibold">Expertise des contributeurs:</span> Notre communauté regroupe des experts et des passionnés.</li>
                                    <li><span class="font-semibold">Qualité des réponses:</span> Nous nous engageons à fournir des réponses claires et précises.</li>
                                    <li><span class="font-semibold">Approche collaborative:</span> Nous encourageons les interactions entre utilisateurs.</li>
                                </ul>
                            </div>

                            <div>
                                <a href="<?php echo e(route('login')); ?>" class="text-indigo-400 hover:text-indigo-300 font-bold">Rejoignez-nous !</a>
                                <p class="mt-4">Ensemble, construisons un monde où la connaissance est accessible à tous !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Réseaux sociaux -->
            <div class="md:col-span-7">
                <div class="mt-8 pt-8 border-t border-gray-800">
                    <div class="flex flex-wrap items-center justify-between">
                        
                        
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <a href="https://www.facebook.com/mascodeproduct" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-facebook text-blue-400 hover:text-blue-300"></i>
                            </a>
                            <a href="https://x.com/negroconstantin" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-twitter text-gray-400 hover:text-gray-300"></i>
                            </a>
                            <a href="https://www.instagram.com/mascodeproduct/" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-instagram text-pink-400 hover:text-pink-300"></i>
                            </a>
                            <a href="https://youtube.com/@masproduct360" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-youtube text-red-400 hover:text-red-300"></i>
                            </a>
                            <a href="https://github.com/MasirikaConstantin" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-github text-gray-400 hover:text-gray-300"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Formulaire de contact -->
                    <div class="mt-8">
                        <h3 class="text-indigo-400 font-bold mb-4">Contactez-nous</h3>
                        <form id="contactForm" class="space-y-4" action="<?php echo e(route('contacts')); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                              <div>
                                  <label for="name" class="block text-sm font-medium text-gray-400">Nom</label>
                                  <input type="text" id="name" name="nom" value="" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                      <p class="mt-1 text-sm text-red-600">Min 4 :</p>
                              </div>
                              <div>
                                  <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                                  <input type="email" id="email" name="email" value="" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                      <p class="mt-1 text-sm text-red-600">Email Valide</p>
                              </div>
                          </div>
                          <div>
                              <label for="message" class="block text-sm font-medium text-gray-400">Message</label>
                              <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                  <p class="mt-1 text-sm text-red-600">Min 10 :</p>
                          </div>
                          <button type="submit" class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                              Envoyer
                          </button>
                      </form>
                      
                      <script>
                        document.getElementById('contactForm').addEventListener('submit', async function(event) {
                            event.preventDefault(); // Empêche le rechargement de la page
                            
                            // Récupère les valeurs des champs du formulaire
                            const name = document.getElementById('name').value.trim();
                            const email = document.getElementById('email').value.trim();
                            const message = document.getElementById('message').value.trim();
                    
                            // Vérifie la longueur du nom et du message, et la validité de l'email
                            if (name.length < 4) {
                                alert("Le nom doit contenir au moins 4 caractères.");
                                return;
                            }
                            if (message.length < 10) {
                                alert("Le message doit contenir au moins 10 caractères.");
                                return;
                            }
                            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailPattern.test(email)) {
                                alert("Veuillez entrer une adresse email valide.");
                                return;
                            }
                    
                            // Si les validations passent, prépare l'envoi du formulaire
                            const formData = new FormData(this);
                    
                            try {
                                const response = await fetch("<?php echo e(route('contacts')); ?>", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                                    },
                                    body: formData
                                });
                    
                                if (response.ok) {
                                    // Vérifie si le contenu est JSON
                                    const contentType = response.headers.get("content-type");
                                    if (contentType && contentType.includes("application/json")) {
                                        const data = await response.json();
                                        alert('Formulaire envoyé avec succès !');
                                    } else {
                                        alert('Votre message a été bien envoyé.');
                                    }
                                } else {
                                    // Affiche les erreurs de validation ou un statut HTTP non "ok"
                                    const errors = await response.json();
                                    console.log(errors);
                                    alert('Erreur lors de l\'envoi du formulaire.');
                                }
                            } catch (error) {
                                console.error('Erreur de soumission :', error);
                                alert('Une erreur est survenue lors de l\'envoi.');
                            }
                        });
                    </script>
                    
                    
                      
                    </div>
                </div>
            </div>
        </div>

    </div>
    <p class="text-gray-400 text-center mt-6">&copy; 2023 - 2024 <strong>Mas Code Product </strong>Company, Inc. Tout droit réservé.</p>

</footer>

<style>
.social-link {
    @apply p-2 rounded-full transition-colors duration-300 hover:bg-gray-800/50;
}
</style>
</div>
<style>
    .s{
      margin: .15rem;
      font-size: 1.5rem;
    }
</style>


<script>
  function affichetext(element, txt, interval) {
    let i = 0;
    let timer = setInterval(function() {
      if (i < txt.length) {
        element.innerHTML += txt.charAt(i);
        i++;
      } else {
        clearInterval(timer);
      }
    }, interval);
  }

  const monElement = document.getElementById("monElement");
  const maPhrase = "--- Développé vos idées en réalité ----";
  const vitesse = 100;
  affichetext(monElement, maPhrase, vitesse);
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
	<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			var img = document.createElement('img');
			img.src = e.target.result;
			document.getElementById('imageDiv').appendChild(img);
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>

<script>
  new TomSelect('select[multiple]',{plugins:{remove_button: {title: 'Delacher'}}})
</script>

<script>
  // Auto-fermeture de l'alerte après 5 secondes
  setTimeout(() => {
      const alert = document.getElementById('successAlert');
      if (alert) {
          alert.remove();
      }
  }, 5000);
</script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="<?php echo e(asset('prism.js')); ?>"></script>
<script src="<?php echo e(asset('quill.js')); ?>"></script>


    </body>
























    
</html>
<?php /**PATH /home/masirika-constantin/Vidéos/Mas-Code/resources/views/base.blade.php ENDPATH**/ ?>