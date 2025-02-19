<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $astuce->titre }} - Mas Code Product</title>
<meta name="description" content="{{ $astuce->description }}" />
<meta name="keywords" content="{{ implode(', ', $astuce->tags->pluck('nom')->toArray()) }}" />
<meta name="author" content="{{ mb_strtoupper($astuce->users->name, 'UTF-8') }}" />
<meta name="robots" content="all">
<meta property="og:locale" content="fr_FR" />
<meta property="og:site_name" content="Mas Code Product" />
<meta name="msvalidate.01" content="F61941C03B23140DCAE7F648A3DEE7E6" />
<meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ mb_strtoupper($astuce->titre, 'UTF-8') }}" />
<meta property="og:description" content="{{ $astuce->description }}" />
<meta property="og:url" content="{{ route('astuces.shoastuce', ['nom' => $astuce->slug]) }}" />
<meta property="og:image" content="{{ $astuce->imageUrlAstuce() ? $astuce->imageUrlAstuce() : asset('mas product.png') }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="article:author" content="{{ mb_strtoupper($astuce->users->name,'UTF-8') }}" />
<meta property="article:tag" content="{{ implode(', ', $astuce->tags->pluck('nom')->toArray()) }}" />
<meta property="article:published_time" content="{{ $astuce->created_at->toIso8601String() }}" />
<meta property="article:modified_time" content="{{ $astuce->updated_at->toIso8601String() }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@Mascodeproduct" />
<meta name="twitter:creator" content="{{ '@'.$astuce->users->name }}" />
<meta name="twitter:title" content="{{ $astuce->titre }}" />
<meta name="twitter:description" content="{{ $astuce->description }}" />
<meta name="twitter:image" content="{{ $astuce->imageUrlAstuce() ? $astuce->imageUrlAstuce() : asset('mas product.png') }}" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Mas Code Product">
<meta name="msapplication-TileImage" content="{{ asset('mas product.png') }}">
<meta name="msapplication-TileColor" content="#E11308">
<style>
    .ql-code-block-container {
        background-color: #4f4848;
        padding: 10px;
        border-radius: 4px;
        font-family: monospace;
        overflow-x: auto; /* Ajoute une barre de défilement horizontale si nécessaire */
        font-size: 12px;
    }

    .ql-code-block-container code {
        font-family: monospace;
    }
</style>
@extends('base')
@section('contenus')
@section('section',"")
@section('titre',$astuce->titre)
    @php
            date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME,'fr_FR.utf8');
        \Carbon\Carbon::setLocale('fr');
                      $count=0;
                      $count1="0";
                        $k =0;
                      $class=null;
                      if($astuce->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($astuce->categorie_id==33){
                                $class='language-css';
                            }
                            elseif($astuce->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($astuce->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($astuce->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($astuce->categorie_id==6){
                                $class='language-java';
                            }else{
                              $class='language-html';

                            }
@endphp
    
 

<main class="flex flex-col md:flex-row gap-8">
  
  <div class="w-full md:w-2/3  p-6 rounded-lg shadow-md ">
      <article class="mx-auto w-full  max-w-2xl format format-sm sm:format-base lg:format-lg format-blue adrks:format-invert">
        @if (session('success'))
        <div class="bg-green-100 mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
            <h3>{{session('success')}}</h3>
        </div>
      @endif
      
      @guest
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
            Se connecter avant de commenter ce post
        </div>
      @endguest
          <header class="mb-4 lg:mb-6 not-format">
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 adrks:text-white">

                <button type="button" class="focus:outline-none"  data-modal-target="userModal{{$count}}" data-modal-toggle="userModal{{$count}}">

                    @if ($astuce->user->image)
                        <img class="mr-4 w-16 h-16 rounded-full border-2 border-indigo-500" src="{{$astuce->user->imageUrlAstuces()}}" alt="{{$astuce->user->name}}">
                    @else
                        <div class="w-12 h-12 rounded-full bg-slate-700 flex items-center justify-center">
                            <svg class="w-[48px] h-[48px] text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </div>
                    @endif
                </button>


                <div id="userModal{{$count}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center backdrop-blur-xl">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal Container -->
                        <div class="relative bg-gradient-to-br from-violet-950/90 to-indigo-950/90 rounded-2xl shadow-2xl border border-violet-500/20">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center p-5 rounded-t border-b border-violet-600/30 bg-violet-900/30 backdrop-blur-sm">
                                <h3 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                                    Profil utilisateur
                                </h3>
                                <button type="button" 
                                        class="text-violet-300 hover:text-white bg-violet-800/30 hover:bg-violet-700/50 rounded-lg p-2 transition-all duration-300 transform hover:scale-105" 
                                        data-modal-toggle="userModal{{$count}}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                  
                            <!-- Modal Body -->
                            <div class="p-6 space-y-6 bg-gradient-to-br from-violet-900/50 to-indigo-900/50 rounded-b-2xl backdrop-blur-md">
                                <div class="backdrop-filter backdrop-blur-sm bg-white/5 rounded-xl p-6 border border-violet-500/20 shadow-lg">
                                    <div class="flex items-center space-x-6">
                                        <!-- Image Section -->
                                        
                                        <div class="flex-shrink-0 relative group">
                                            @if($astuce->users->image)
                                                <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300" 
                                                     src="{{$astuce->user->imageUrlAstuces()}}" 
                                                     alt="{{$astuce->user->name}}"
                                                />
                                            @else
                                                <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300"
                                                     src="{{asset('téléchargement.png')}}" 
                                                     alt="Default profile"
                                                />
                                            @endif
                                            <div class="absolute inset-0 rounded-full bg-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                               </div>
                                        </div>
                  
                                        <!-- User Info Section -->
                                        <div class="flex-1 space-y-4">
                                            <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                                                {{$astuce->user->name}}
                                            </h3>
                  
                                            <p class="text-violet-200 font-medium">
                                                Membre depuis 
                                                <span class="text-pink-200 font-semibold">
                                                    {{$astuce->user->created_at->diffForHumans( )}}
                                                </span>
                                            </p>
                  
                                            <p class="text-violet-300/90">
                                                <span class="text-sm flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                                    </svg>
                                                    {{$astuce->user->subscribers()->count()}} abonnés
                                                </span>
                                            </p>
                  
                                            <a href="{{route('user.profil', ['user'=>$astuce->user,'nom'=>(Str::slug($astuce->user->name,'-'))])}}"
                                               class="inline-block px-6 py-2.5 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white font-medium rounded-full transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-violet-500/50">
                                                Voir le profil
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>



                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-200 adrks:text-white">{{$astuce->user->name}}</a>
                          
                         
                          <p class="text-base text-gray-400 adrks:text-gray-400">
                            <time pubdate datetime="{{ $astuce->created_at }}" title="{{ $astuce->created_at->translatedFormat('d F Y') }}">
                              {{ $astuce->created_at->diffForHumans() }}
                            </time>
                          </p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-200 lg:mb-6 lg:text-4xl adrks:text-white">{{$astuce->titre}}</h1>
          </header>
          @if ($astuce->image)
          <figure><img src="{{ $astuce->imageUrlAstuce() }}" alt="">
        </figure>
          @endif
          <form action="{{ route('enregistrements.store', $astuce) }}" method="POST">
              @csrf
             @auth
             @if (auth()->user()->savedPosts->contains($astuce))
             <button type="button" class="text-green-500 hover:text-green-700 cursor-not-allowed" disabled>
               Déjà enregistré
           </button>
               @else

             <button type="submit" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
               <svg class="w-[20px] h-[20px] mr-4 text-amber-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6"/>
                 </svg>
                 
               Enregistrer ce post
               </button>
           
               @endif
             @endauth
             @guest
             <a href="{{ route('login') }}"  class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2">
                <svg class="w-[20px] h-[20px] mr-4 text-amber-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6"/>
                  </svg>
                  
                Enregistrer ce post
                </a>
             @endguest
          </form>
          <div class=" text-white text-l" style="color: white !important">{!! $astuce->contenus !!}</div>
          <p>
                @if ($astuce->codesource)
                  <pre style="" class="border border-5  mt-5 " ><code class="{{$class}}">{{($astuce->codesource)}}</code></pre>
                @endif
          </p>

    <div class="">


    <div class="flex flex-col space-y-4">
        <!-- Reactions Container -->
        <div class="flex items-center gap-2 flex-wrap">
            <span class="text-slate-400">Tags:</span>
            @foreach ($astuce->tags as $tag)
            
        @if ($tag->status == false)
                            <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                                {{$tag->nom}}
                            </span>
                            @endif
            @endforeach
        </div>
        

        
    </div>


    </div>

          
    <section class="not-format  mt-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-200 dark:text-white">Discussion</h2>
        </div>

        <!-- Formulaire de commentaire -->
        <form method="POST" class="mb-6">
            @csrf
            @auth
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="astuce_id" value="{{ $astuce->id }}">
            @endauth

            <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Votre commentaire</label>
                <textarea name="contenus" rows="3" class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Écrivez un commentaire... (*)" required>{{ old('contenus') }}</textarea>
            </div>
            @error("contenus")
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Erreur !</span> {{ $message }}
                    </div>
                </div>
            @enderror

            <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="codesource" class="sr-only">Code source</label>
                <textarea name="codesource" rows="3" class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Code Source (Facultatif)">{{ old('codesource') }}</textarea>
            </div>
            @error("codesource")
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Erreur !</span> {{ $message }}
                    </div>
                </div>
            @enderror

            @auth
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Commenter
                </button>
            @endauth
            @guest
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                    <a href="{{ route('login') }}">Se connecter avant de commenter cette astuce</a>
                </div>
            @endguest
        </form>

        <!-- Liste des commentaires -->
        @foreach ($commentaires as $comm)
            <article class="p-6 mb-6 text-base bg-gray-800 rounded-lg ">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-200 dark:text-white">
                            @if ($comm->user->image)
                                <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comm->user->imageUrls() }}" alt="{{ $comm->user->name }}">
                            @else
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->index }}">
                                    <a id="exemple">
                                        <i class="bi bi-person-circle s"></i>
                                    </a>
                                </button>
                            @endif
                            {{ $comm->user->name }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <time pubdate datetime="{{ $comm->created_at->toIso8601String() }}" title="{{ $comm->created_at->format('d F Y') }}">
                                {{ $comm->created_at->diffForHumans() }}
                            </time>
                        </p>
                    </div>
                    @auth
                        @if ($comm->user->id == Auth::user()->id)
                            <button id="dropdownComment{{ $loop->index }}Button" data-dropdown-toggle="dropdownComment{{ $loop->index }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-gray-800 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-750 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                                <span class="sr-only">Paramètres du commentaire</span>
                            </button>
                            <!-- Menu déroulant -->
                            <div id="dropdownComment{{ $loop->index }}" class="hidden z-10 w-36 bg-gray-800 rounded divide-y divide-gray-800 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-100 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="{{ route('edit.comm', ['comment' => $comm->id]) }}" class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('deletecomm', ['id' => $comm->id]) }}" class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endauth
                </footer>
                <p>
                    {{ $comm->contenus }}
                    @if ($comm->codesource)
                        <pre class="border border-5 mt-5"><code class="{{ $class }}">{{ $comm->codesource }}</code></pre>
                    @endif
                </p>
            </article>
        @endforeach

        <!-- Pagination des commentaires -->
        <div class="mb-6">
            {{ $commentaires->links() }}
        </div>
    </section>

      </article>
  </div>



  <div aria-label="Related articles" class="w-full md:w-full lg:w-4/12">
    <div class="sticky top-4">
      <div class="bg-gray-700 p-3 rounded-lg shadow-md">
        <div class="mt-6">
          <h2 class="text-xl font-bold mb-4">Autres publications</h2>
        </div>
        <div class="space-y-2">
          @forelse ($ast1 as $t)
            <a href="{{ route('astuces.shoastuce', ['nom' => $t->slug]) }}" class="block group hover:bg-slate-800 p-4 rounded-lg transition-all">
              <div class="flex items-center gap-2">
                <div class="w-12 h-12 rounded-lg text-indigo-400">
                  @if ($t->image)
                      <img src="{{ $t->imageUrlAstuce() }}" class="rounded-lg mr-3" alt="" srcset="">
                  @else
                  {!! $t->category->svg !!}
                  @endif
                </div>
                <div class="flex-1">
                  <h3 class="text-white font-medium group-hover:text-indigo-400 transition-colors">
                    {{ Str::limit($t->titre,30) }}
                  </h3>
                  <p class="text-slate-400 text-sm mt-1">
                    {{ Str::limit($astuce->description, 80) }}
                  </p>
                </div>
              </div>
            </a>
          @empty
            @foreach ($ast2 as $d)
              <div class="bg-slate-800 p-4 rounded-lg">
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 text-indigo-400">
                    {!! $d->category->svg !!}
                  </div>
                  <div>
                    <h3 class="text-white font-medium">{{ $d->titre }}</h3>
                    <p class="text-slate-400 text-sm">Brève description</p>
                  </div>
                </div>
              </div>
            @endforeach
          @endforelse
        </div>
      </div>
    </div>
  </div>


</main>







<script>
    // Appliquer Prism.js après le chargement du contenu
    document.addEventListener('DOMContentLoaded', function () {
        Prism.highlightAll();
    });
</script>



@endsection