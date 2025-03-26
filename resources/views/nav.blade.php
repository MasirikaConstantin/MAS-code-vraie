<nav class="backdrop-blur-md bg-opacity-70 bg-gray-900 mb-6 fixed w-full z-20 top-0 start-0 border-b border-cyan-500/30 shadow-lg shadow-cyan-500/20">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="{{route('index')}}" class="flex items-center space-x-3 rtl:space-x-reverse group">
      <div class="relative">
        <img src="{{asset('mas product.png')}}" class="h-8 transition-transform duration-300 group-hover:scale-110" alt="Logo">
        <div class="absolute inset-0 bg-cyan-500 opacity-20 blur-xl group-hover:opacity-30 transition-opacity duration-300"></div>
      </div>
      <span class="self-center text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 hover:from-cyan-300 hover:to-blue-400 transition-all duration-300">Mas Code</span>
    </a>

    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-cyan-400 rounded-lg md:hidden hover:bg-gray-800/50 focus:outline-none focus:ring-2 focus:ring-cyan-500">
      <span class="sr-only">Menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
      </svg>
    </button>

    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
        <li>
          <a href="{{route('index')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Accueil</a>
        </li>
        @if (str_contains($route, 'user'))
        <li>
          <a href="{{route('user.newpost')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Post</a>
        </li>
        @endif
        
        <li>
          <a href="{{route('user.accueil')}}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Forum</a>
        </li>
        <li>
          <a href="{{route('astuces')}}"
            class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">
             Astuces
         </a>
        </li>
        <li>
          <a href="{{ route('news') }}" class="block py-2 px-3 text-cyan-400 rounded hover:bg-gray-800/50 hover:text-cyan-300 transition-colors duration-300">Blog</a>
        </li>
        <li class="relative">
          <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 focus:ring-4 focus:ring-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center transition-all duration-300" type="button">
            Compte
           @if (Auth::user())
              @if(Auth::user()->image)
                <img src="{{Auth::user()->imageUrls()}}" class="w-3.5 h-3.5 ms-3 rounded-full"> <!-- Image plus grande -->
              @else
                <svg class="w-3.5 h-3.5 ms-3 text-cyan-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                </svg>
            @endif
           @else
           <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg>
           @endif
          </button>
          
          <div id="dropdownInformation" class="z-10 hidden backdrop-blur-md bg-gray-900/90 divide-y divide-gray-700/50 rounded-lg shadow-lg shadow-cyan-500/20 min-w-[250px]"> <!-- Augmentation de la largeur minimale -->
            <div class="px-4 py-4 text-sm text-cyan-400"> <!-- Augmentation du padding -->
              @auth
                <div>
                  <ul class="text-sm text-cyan-400" aria-labelledby="dropdownInformationButton">
                    <li class="flex items-center px-1 py-2 hover:bg-gray-800/50 rounded transition-colors duration-300"> <!-- Augmentation du padding vertical -->
                      @if(Auth::user()->image)
                        <img src="{{Auth::user()->imageUrls()}}" class="w-8 h-8 me-3 rounded-full"> <!-- Image plus grande -->
                      @else
                        <svg class="w-8 h-8 me-3 text-cyan-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                        </svg>
                      @endif
                      <span class="text-base">{{Str::limit(Auth::user()->name,15)}}</span> <!-- Texte plus grand -->
                    </li>
                  </ul>
                </div>
                <div class="text-cyan-400 truncate mt-2 text-base">{{Auth::user()->email}}</div> <!-- Email plus grand -->
              @endauth
              @guest
                <div class="space-y-3"> <!-- Ajout d'espacement entre les boutons -->
                  <a href="{{route('login')}}" class="flex items-center justify-between w-full p-3 font-medium text-cyan-400 hover:text-cyan-300 hover:bg-gray-800/50 rounded transition-all duration-300">
                    <span class="text-base">Se Connecter</span> <!-- Texte plus grand -->
                    <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                  </a>
                  <a href="{{route('register')}}" class="flex items-center justify-between w-full p-3 font-medium text-cyan-400 hover:text-cyan-300 hover:bg-gray-800/50 rounded transition-all duration-300">
                    <span class="text-base">Créer un Compte</span> <!-- Texte plus grand -->
                    <svg class="w-5 h-5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                  </a>
                </div>
              @endguest
            </div>
            @auth
              <ul class="py-2 text-sm text-cyan-400">
                <li>
                  <a href="{{route('dashboard')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Mon Compte")}}</a> <!-- Padding et texte plus grands -->
                </li>
                @auth
                  @if (Auth::user()->role==0)
                  <li>
                    <a href="{{route('admin.dashboard')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">{{__("Dashboard")}}</a> <!-- Padding et texte plus grands -->
                  </li>
                    
                  @endif
                @endauth

                <li>
                  <a href="{{route('user.newpost')}}" class="block px-4 py-3 text-base hover:bg-gray-800/50 transition-colors duration-300">Nouveau Post</a> <!-- Padding et texte plus grands -->
                </li>
              </ul>
              <div class="py-2">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="block px-4 py-3 text-base text-red-400 hover:bg-gray-800/50 transition-colors duration-300" href="{{route('logout')}}" 
                     onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Se Déconnecter') }}
                  </a>
                </form>
              </div>
            @endauth
          </div>



        </li>
      </ul>
    </div>
  </div>
</nav>




<style>
  @keyframes glow {
    0%, 100% { box-shadow: 0 0 5px #0ff, 0 0 10px #0ff, 0 0 15px #0ff; }
    50% { box-shadow: 0 0 10px #0ff, 0 0 20px #0ff, 0 0 30px #0ff; }
  }
  
  nav {
    /*animation: glow 3s infinite;*/
  }
  
  #dropdownInformation {
    min-width: 250px; /* Largeur minimale du dropdown */
    max-width: 300px; /* Largeur maximale du dropdown */
    margin-top: 0.5rem; /* Espacement depuis le bouton */
  }
  
  #dropdownInformation a {
    white-space: nowrap; /* Empêche le texte de se wrapper */
    overflow: hidden;
    text-overflow: ellipsis; /* Ajoute des points de suspension si le texte est trop long */
  }
  
  /* Animation d'apparition du dropdown */
  #dropdownInformation.show {
    /*animation: dropdownFade 0.3s ease-in-out;*/
  }
  
  @keyframes dropdownFade {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  </style>
  
  <script>
  // Make sure Flowbite is initialized
  if (typeof window.Flowbite === 'undefined') {
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js';
    document.head.appendChild(script);
  }
  </script>