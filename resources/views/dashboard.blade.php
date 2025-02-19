@extends('base')
@section('section',"Moi")
@section('titre',"Mon Compte")
@section('contenus')
@php
  $user=Auth::user();
  date_default_timezone_set('Europe/Paris');
@endphp
@php
$k=0;
  setlocale(LC_TIME,'fr_FR.utf8');
  \Carbon\Carbon::setLocale('fr');
@endphp
    <style>
        @keyframes glow {
            0% { box-shadow: 0 0 5px #4f46e5; }
            50% { box-shadow: 0 0 20px #4f46e5; }
            100% { box-shadow: 0 0 5px #4f46e5; }
        }

        <style>
    /* Animation de lueur */
    @keyframes glow {
        0% { box-shadow: 0 0 5px #4f46e5; }
        50% { box-shadow: 0 0 20px #4f46e5; }
        100% { box-shadow: 0 0 5px #4f46e5; }
    }

  
    </style>
</head>
<body class="bg-gray-900 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Alert</span> {{ session('success') }}.
          </div>
        @endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profil Section -->
            <div class="lg:col-span-1">
                <div class="bg-gray-800 rounded-xl p-6 backdrop-blur-lg border border-indigo-500/20 hover:border-indigo-500/40 transition-all duration-300" style="animation: glow 3s infinite">
                    <!-- Photo de profil -->
                    <div class="flex justify-center mb-6">
                        @if (Auth::user()->image!=null)
                            <div class="relative">
                                <img class="w-32 h-32 rounded-full object-cover border-4 border-indigo-500" src="{{$user->imageUrls()}}" alt="{{$user->name}}">
                                <div class="absolute inset-0 rounded-full bg-indigo-500/20 animate-pulse"></div>
                            </div>
                        @else
                            <img class="w-32 h-32 rounded-full border-4 border-indigo-500" src="{{asset('téléchargement.png')}}" alt="Default">
                        @endif
                    </div>

                    <!-- Informations utilisateur -->
                    <div class="space-y-4">
                        <div class="flex flex-col space-y-2 text-gray-300">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Nom:</span>
                                <span class="font-bold text-indigo-400">{{$user->name}}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Email:</span>
                                <span class="font-bold text-indigo-400">{{$user->email}}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Abonnés:</span>
                                <span class="font-bold text-indigo-400">{{$user->subscribers()->count()}}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-400">Posts:</span>
                                <span class="font-bold text-indigo-400">{{$user->posts()->count()}}</span>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex flex-col space-y-3 mt-6">
                            <a href="{{route('profile.edit')}}" class="btn-futuristic">
                                <span class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-all duration-300 flex items-center justify-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    <span>Modifier le profil</span>
                                </span>
                            </a>

                            <div class="">
                              <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="w-full bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-all duration-300 flex items-center justify-between" type="button">Action<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                                </button>
                                
                                <div id="multi-dropdown" class="z-10 hidden dropdown-menu hidden absolute w-full mt-2 bg-gray-700 rounded-lg shadow-xl">
                                  <ul class="py-2 text-sm text-gray-700 adrks:text-gray-200" aria-labelledby="multiLevelDropdownButton">
                                    <li >
                                    <!--a href="" ></a-->
                                    <button data-modal-target="static-modal"  data-modal-toggle="static-modal" class="block px-4 py-2 hover:bg-gray-600 text-gray-300 hover:text-white w-full" type="button">
                                        Astuce
                                      </button>
                                    </li>
                             
  
                                    <li class="flex justify-center">
                                        <a href="{{route('user.newpost')}}" class="block px-4 py-2 hover:bg-gray-600 text-gray-300 hover:text-white w-full text-center">Post</a>
                                    </li>
                                    
                                    
                                  </ul>
                              </div>  
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal -->
            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Créer une Astuce
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                De quel manière voulez-vous styliser votre astuce ? 
                            </p>
                            
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <a href="{{route('astuces.new')}}" data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Utilister un éditeur de text enrichis</a>
                            <a href="{{route('astuces.newsans')}}" data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Styliser Personnellement</a>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Content Section -->
            <div class="lg:col-span-2">
                <div class="bg-gray-800 rounded-xl p-6 backdrop-blur-lg border border-indigo-500/20">
                    <!-- Navigation tabs -->
                    <div class="flex space-x-4 mb-6">
                        <a href="?demande" class="tab-futuristic {{ !request('demande') ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline' }}">
                            Brouillon
                        </a>
                        <a href="?demande=q" class="tab-futuristic {{ request('demande') == 'q' ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline' }}">
                            Mes Questions
                        </a>
                        <a href="?demande=a" class="tab-futuristic {{ request('demande') == 'a' ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline' }}">
                            Mes Astuces
                        </a>

                        <a href="?demande=e" class="tab-futuristic {{ request('demande') == 'e' ? 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 adrks:bg-blue-600 adrks:hover:bg-blue-700 focus:outline-none adrks:focus:ring-blue-800' : 'font-medium text-blue-600 adrks:text-blue-500 hover:underline' }}">
                            Mes Enregistrements
                        </a>
                    </div>

                    <!-- Content area -->
                    <div class="space-y-6">
                        <!-- Content will be inserted here based on the selected tab -->

                        @if (request('demande')=="q")
                        @foreach ($posts as $post)
                        @php
                        $titre = str_replace(' ','-',$post->slug);
                        @endphp
                        
                        <div class="py-2 mt-3">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 relative p-6 transition-all duration-300 hover:border-indigo-500/40 hover:-translate-y-1">
                                    <form method="POST" action="{{ route('user.posts.update', $post) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        
                                        <div class="flex flex-wrap gap-4 mb-4">
                                            <div class="flex items-center">
                                                <input type="hidden" name="etat" value="0">
                                                <input class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-gray-700 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-gray-200 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-indigo-600 checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none hover:cursor-pointer focus:outline-none" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="etat" value="1" {{$post->etat == 1 ? "checked" : ""}}>
                                                <label class="inline-block pl-[0.15rem] text-gray-200 hover:cursor-pointer" for="flexSwitchCheckChecked">Masqué</label>
                                            </div>
                                            <button type="submit" class="px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300 shadow-lg shadow-indigo-500/20">
                                                Mettre à jour
                                            </button>
                                        </div>
                                    </form>
                    
                                    <div class="space-y-4">
                                        <div class="rounded-lg overflow-hidden bg-gray-900/50 border border-gray-700">
                                            <div class="p-4 bg-gradient-to-r from-gray-900 to-slate-800">
                                                <strong class="text-indigo-400">{{$post->titre}}</strong>
                                                <p><a href="{{route('user.modif',['post'=>$post->id])}}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Modifier</a></p>
                                            </div>
                                            
                                            <div class="p-4 border-t border-gray-700 text-gray-300">
                                                @if ($post->created_at != $post->updated_at)
                                                <p class="flex items-center gap-2 mb-2">
                                                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                    </svg>
                                                    <span class="bg-gray-800 px-2 py-1 rounded-lg text-sm border border-gray-700">
                                                        Modifier le: {{$post->updated_at->formatLocalized(' %d %B %Y')}} à {{$post->updated_at->format(' H : i')}}
                                                    </span>
                                                </p>
                                                @endif
                                                <p>{{Str::limit($post->contenus,500)}}</p>
                                            </div>
                    
                                            @if ($post->codesource)
                                            <div class="p-4 border-t border-gray-700">
                                                <pre class="bg-gray-900 rounded-lg p-4 border border-indigo-500/20"><code class="@if($post->categorie_id==1)language-csv @elseif($post->categorie_id==2)language-css @elseif($post->categorie_id==3)language-php @elseif($post->categorie_id==4)language-javascript @elseif($post->categorie_id==5)language-python @elseif($post->categorie_id==6)language-java @endif">{{Str::limit($post->codesource,300)}}</code></pre>
                                            </div>
                                            @endif
                    
                                            @if ($post->image)
                                            <div class="p-4 border-t border-gray-700">
                                                <img src="{{$post->imageUrl()}}" class="w-full h-[300px] object-cover rounded-lg" alt="">
                                            </div>
                                            @endif
                    
                                            <div class="p-4 border-t border-gray-700">
                                                <div class="text-sm text-gray-400">
                                                    @if ($post->category)
                                                    <p class="mb-2">
                                                        Categorie: <strong class="text-indigo-400">{{$post->category?->titre}}</strong>
                                                    </p>
                                                    @endif
                    
                                                    @if (!$post->tags->isEmpty())
                                                    <div class="flex flex-wrap gap-2 mb-2">
                                                        Tags:
                                                        @foreach ($post->tags as $tag)
                                                        <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                                                            {{$tag->nom}}
                                                        </span>
                                                        @endforeach
                                                    </div>
                                                    @endif
                    
                                                    <p class="text-gray-500">Publié le: {{$post->updated_at->formatLocalized(' %d %B %Y')}}</p>
                                                    <p class="text-gray-500">Créer par: {{$post->users->name}}</p>
                                                    
                                                    <a href="{{route('user.show',['nom'=>Str::lower($titre)])}}" class="text-indigo-400 hover:text-indigo-300 transition-colors block mt-2">
                                                        Lire la suite
                                                    </a>

                                                    <a href="{{route('user.modif',['post'=>$post])}}" class="text-indigo-400 hover:text-indigo-300 transition-colors block mt-2">
                                                        Modifier
                                                    </a>
                    
                                                    <p class="text-gray-500 mt-2">
                                                        {{ $post->views_count }} @if($post->views_count>1)vues @else vue @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        <!-- Pagination -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                            <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 p-6">
                                {{$posts->appends(Request::except('page'))->links()}}
                            </div>
                        </div>

                        @elseif(request('demande')=="a")
                            <!-- Code pour les astuces -->
                            <!-- [Suite du code avec les mêmes principes de conversion] -->
                            @forelse ($astuces as $astuce)

                            <div class="py-2 mt-3">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 p-6">
                                    <div class="bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 transition-all duration-300 hover:border-indigo-500/40 hover:shadow-xl hover:shadow-indigo-500/20">
                                        <!-- Contenu Principal -->
                                        <div class="overflow-hidden">
                                            <div class="p-6 text-gray-200 prose prose-invert prose-indigo max-w-none" style="text-align: justify">
                                                {!! Str::limit($astuce->contenus, 550) !!}

                                            </div>
                                        </div>
                            
                                        <!-- Section État et Modification -->
                                        <div class="border-t border-indigo-500/20 p-4 mt-4">
                                            @if ($astuce->etat == false)
                                                <div class="bg-amber-500/10 border border-amber-500/20 rounded-lg p-4 mb-4">
                                                    <div class="flex items-center gap-3 text-amber-400">
                                                        <!-- Icône d'avertissement -->
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                        </svg>
                                                        
                                                        <span>Vous êtes le seul et les administrateurs à voir cette astuce avant sa validation</span>
                                                        
                                                        <!-- Animation de chargement -->
                                                        <div class="relative w-5 h-5">
                                                            <div class="absolute inset-0 border-2 border-amber-400 border-t-transparent rounded-full animate-spin"></div>
                                                        </div>
                                                        
                                                    </div>
                                                    <a href="{{route('astuces.previsualiser',['astuce'=>$astuce->slug])}}" 
                                                        class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300 group">
                                                         Prévisualiser
                                                         <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                                         </svg>
                                                     </a>
                                                </div>
                                            @endif
                            
                                            <a href="{{route('astuces.editastuce',['astuce'=>$astuce->id])}}" 
                                               class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300 group">
                                                Modifier
                                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                                </svg>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 adrks:bg-gray-700">
                            @empty

                            @endforelse
                            <div class="mt-3">
                                {{$astuces->appends(Request::except('page'))->links()}}

                            </div>


                            @elseif (request('demande')=="e")
                            
                                <div class="space-y-4">
                                    @foreach ($savedPosts as $post)
                                        <div class="bg-gray-700 p-6 rounded-lg shadow-md">
                                            <h2 class="text-xl font-semibold">{{ $post->titre }}</h2>
                                            <p class="text-gray-200 mt-2">{{ Str::limit($post->description,190) }}</p>
                                            <p class="text-sm text-gray-300 mt-2">
                                                Posté par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}
                                            </p>
                                            <form action="{{ route('enregistrements.destroy', $post) }}" method="POST" class="mt-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Retirer de mes enregistrements</button>
                                            </form>
                                        </div>
                                    @endforeach
                           

                            @elseif(request('demande')=='')
                                        <div class="mt-3 p-6 bg-gradient-to-br from-gray-900/90 to-slate-800/90 backdrop-blur-lg rounded-xl border border-indigo-500/20 transition-all duration-300 hover:border-indigo-500/40">
                                            <div class="overflow-x-auto">
                                                <table class="w-full min-w-full divide-y divide-indigo-500/20">
                                                    <thead>
                                                        <tr class="bg-indigo-500/10">
                                                            <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Sujet</th>
                                                            <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Etat</th>
                                                            <th class="px-6 py-4 text-left text-sm font-medium text-indigo-300 tracking-wider">Visites</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-indigo-500/20 bg-gray-900/50">
                                                        @forelse ($postsbruillon as $post)
                                                            @if ($post->etat == 1)
                                                            <tr class="hover:bg-indigo-500/5 transition-colors duration-200">
                                                                <td class="px-6 py-4">
                                                                    <div class="space-y-3">
                                                                        <h4 class="text-lg font-semibold text-gray-200">
                                                                            {{ $post->titre}}
                                                                        </h4>
                                                                        <div class="flex items-center space-x-4 text-gray-400">
                                                                            <span>Réactions</span>
                                                                            <div class="flex items-center space-x-2">
                                                                                <i class="bi bi-hand-thumbs-up"></i>
                                                                                <span>{{$post->reactions()->where('reaction', '1')->count()}}</span>
                                                                                <i class="bi bi-hand-thumbs-down"></i>
                                                                                <span>{{$post->reactions()->where('reaction', '0')->count()}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center text-gray-500">
                                                                            <i class="bi bi-clock-history mr-2"></i>
                                                                            <span>Mise à jour il y a : {{ $post->duree}}</span>
                                                                        </div>
                                                                        <div class="flex space-x-3">
                                                                            <a href="{{route('user.modif',['post'=>$post->id])}}" 
                                                                            class="inline-flex items-center px-4 py-2 bg-indigo-600/20 border border-indigo-500 text-indigo-400 rounded-lg hover:bg-indigo-600 hover:text-white transition-all duration-300">
                                                                                <i class="bi bi-pencil-square mr-2"></i>
                                                                                Editer
                                                                            </a>
                                                                            <a href="{{route('user.show',['nom'=>$post->slug])}}"
                                                                            class="inline-flex items-center px-4 py-2 bg-gray-600/20 border border-gray-500 text-gray-400 rounded-lg hover:bg-gray-600 hover:text-white transition-all duration-300">
                                                                                <i class="bi bi-eye mr-2"></i>
                                                                                Voir
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    @if ($post->etat== false)
                                                                        <span class="px-3 py-1 text-sm font-medium bg-green-500/20 text-green-400 rounded-full">
                                                                            Publié
                                                                        </span>
                                                                    @elseif($post->etat ==true)
                                                                        <span class="px-3 py-1 text-sm font-medium bg-amber-500/20 text-amber-400 rounded-full">
                                                                            Non Publié
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td class="px-6 py-4 text-gray-400">
                                                                    <div class="flex items-center space-x-1">
                                                                        <i class="bi bi-eye"></i>
                                                                        <span>{{$post->views_count}}</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @empty
                                                            <tr>
                                                                <td colspan="3" class="px-6 py-4">
                                                                    <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4 text-red-400">
                                                                        Aucune astuces pour l'instant
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="mt-6">
                                                <div class="bg-gray-900/50 rounded-lg p-4">
                                                    {{$postsbruillon->appends(Request::except('page'))->links()}}
                                                </div>
                                            </div>
                                        </div>
                                @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection