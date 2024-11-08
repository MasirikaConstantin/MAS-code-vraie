
<nav class="bg-gray-900 mb-6 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl bg-gray-900 flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="<?php echo e(route('index')); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="<?php echo e(asset('mas product.png')); ?>"  class="h-8" alt="Flowbite Logo">
      <span class="self-center text-2xl text-gray-200  font-semibold whitespace-nowrap dark:text-white">Mas Code </span>
  </a>
  <div class="flex md:order-2 bg-gray-900 space-x-3 md:space-x-0 rtl:space-x-reverse">
   

  


      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center bg-gray-900 justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex bg-gray-900 flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-900 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      
      <li class="bg-gray-900 text-gray-200" >
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['block py-2 px-3 text-gray-200 bg-gray-900 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700', 'block py-2 px-3 text-white bg-gray-900 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500'=>str_contains($route, 'index')]); ?>"  aria-current="page" href="<?php echo e(route('index')); ?>">Accueil</a>
      </li>
      <?php if(str_contains($route, 'user')): ?>
      <li class="bg-gray-900  text-gray-200" >
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700', 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500'=>str_contains($route, 'newpost')]); ?>"  href="<?php echo e(route('user.newpost')); ?>">Post</a>
      </li>
      <?php endif; ?>

      <li class="bg-gray-900 text-gray-200">
        <!--//href="<?php echo e(route('blog.index')); ?>"-->
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700', 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500'=>str_contains($route, 'blog.')]); ?>"  >Blog</a>
      </li>
      <li class="bg-gray-900 text-gray-200" >
        <a class="<?php echo \Illuminate\Support\Arr::toCssClasses(['block py-2 px-3 text-gray-200 rounded hover:bg-gray-700 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700', 'block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500'=>str_contains($route, 'user.')]); ?>" href="<?php echo e(route('user.accueil')); ?>" >Forum</a>
      </li>
    
      <li class="bg-gray-900 text-gray-200">
        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Compte <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
          </button>
          
          <!-- Dropdown menu -->
          <div id="dropdownInformation" class="z-10 hidden bg-gray-900 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <div class="px-4 py-3 bg-gray-900 text-sm text-gray-900 dark:text-white">
                <?php if(auth()->guard()->check()): ?>
        
                  <div>
                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                      <li class="flex items-center text-white px-1 py-1 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">
                          <!--img class="w-6 h-6 me-2 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image"-->
                          <?php if(Auth::user()->image): ?>
                            <img src="<?php echo e(Auth::user()->imageUrls()); ?>" class="w-6 h-6 me-2 rounded-full">
                          <?php else: ?>
                            <svg class="w-6 h-6 me-2 rounded-full" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                          <?php endif; ?>
                            <?php echo e(Str::limit(Auth::user()->name,10)); ?>

                      </li>
                    </ul>
                  </div>
                  <div class="font-medium text-white truncate"><?php echo e(Auth::user()->email); ?></div>
                <?php endif; ?>
                <?php if(auth()->guard()->guest()): ?>
                 
        
          <a href="<?php echo e(route('login')); ?>" class="inline-flex mb-4 items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
            Se Connecter
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
          </a>
          <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
            Créer un Compte
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
          </a>
          
             
                <?php endif; ?>
        
              </div>
              <?php if(auth()->guard()->check()): ?>
              <ul class="py-2 text-sm text-gray-100 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                <li>
                  <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white"><?php echo e(__("Dashboard")); ?></a>
                </li>
                <li>
                  <a href="<?php echo e(route('user.newpost')); ?>" class="block px-4 py-2 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">Nouveau Post</a>
                </li>
                
              </ul>
              <ul class="dropdown-menu text-small " aria-labelledby="dropdownUser1">
        
              </li>
                
              
            
            </ul>
        
        
              <div class="py-2">
                  <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
          
                    <a  class="block px-4 py-2 text-sm text-red-100 hover:bg-gray-700 dark:hover:bg-red-600 dark:text-gray-200 dark:hover:text-white" href=""<?php echo e(route('logout')); ?>

                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <?php echo e(__('Se Déconnecter')); ?>

                    </a>
                </form>
              </div>
              <?php endif; ?>
          </div>
          
        
      </li>
      
    </ul>
  </div>
  </div>
</nav>

<?php /**PATH /home/masirika-constantin/Vidéos/Mas-Code/resources/views/nav.blade.php ENDPATH**/ ?>