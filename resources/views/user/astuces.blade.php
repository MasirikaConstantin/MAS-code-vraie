@extends('base')
@section('titre', Str::substr($astuce->titre,0,20))
@section('section',($astuce->titre))
@section('contenus')

<meta property="og:title" content="{{ $astuce->titre }}" />
<meta property="og:description" content="{{ $astuce->introduction }}" />
<meta property="og:image" content="{{ $astuce->imageUrlAstuce() ? $astuce->imageUrlAstuce() : $astuce->category->svg }}" />
<meta property="og:url" content="{{ route('astuces.shoastuce', ['nom' => $astuce->slug, 'astuce' => $astuce->id]) }}" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Mas Code Product" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:locale" content="fr_FR" />
<meta property="article:published_time" content="{{ $astuce->created_at->toIso8601String() }}" />
<meta property="article:modified_time" content="{{ $astuce->updated_at->toIso8601String() }}" />


@php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
$count =0;
$count1=0;
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

<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenu Principal -->
        <div class="lg:w-2/3">
            <article class="bg-slate-900 rounded-xl shadow-xl p-6 mb-8">
                <!-- Média -->
                @if (session('success'))
                <div class="bg-green-100 mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                    <h3>{{session('success')}}</h3>
                </div>
              @endif
                <div class="mb-8 min-h-full">
                    @if($astuce->video)
                           <div class="h-96" >
                            <iframe  class="h-96 w-full" 
                            src="{{$astuce->video}}"
                            allowfullscreen>
                        </iframe>
                           </div>
                   
                    @endif
                    @if($astuce->image)
                    <img src="{{$astuce->imageUrlAstuce()}}"
                        class="h-96 w-full rounded-lg object-cover"
                        alt="{{$astuce->titre}}">
                        @endif
                </div>

                <!-- CoFcomntenu -->
                <div class="prose prose-invert max-w-none">
                    {!! $astuce->contenus !!}
                </div>

                <!-- Métadonnées -->
                <div class="mt-8 bg-slate-800 rounded-lg p-6 space-y-4">
                    <!-- Catégorie -->
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Catégorie:</span>
                        <span class="px-3 py-1 bg-indigo-500/30 text-indigo-300 rounded-full text-sm">
                            {{$astuce->category->titre}}
                        </span>
                    </div>

                    <!-- Tags -->
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

                    <!-- Mise à jour -->
                    <div class="text-slate-400">
                        Mise à jour il y a: <span class="text-white font-medium">{{$astuce->created_at->diffForHumans()}}</span>
                    </div>

                    <!-- Auteur -->
                    <div class="flex items-center gap-4">
                        <span class="text-slate-400">Auteur:</span>
                        <button class="flex items-center gap-3" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                          @php
                          @endphp  
                          @if($astuce->users->image)
                                <img src="{{$astuce->users->imageUrls()}}"
                                    class="w-12 h-12 rounded-full object-cover"
                                    alt="null">
                            @else
                                <div class="w-12 h-12 rounded-full bg-slate-700 flex items-center justify-center">
                                  <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  
                                  
                                </div>
                            @endif
                            <span class="text-white font-medium">{{$astuce->users->name}}</span>
                            
                        </button>
                    </div>
                </div>










                <section class="not-format mt-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-200 dark:text-white">Discussion</h2>
                    </div>
                    <form method="POST" class="mb-6">
                      @csrf
                
                      @auth
                      <input hidden type="text" value="{{Auth::user()->id}}" name="user_id"  />
                      <input hidden type="text" value="{{$astuce->id}}" name="astuce_id"  />
                  
                      @endauth
                      @error("user_id")
                      {{$message}}
                      @enderror
                      @error("astuce_id")
                      {{$message}}
                      @enderror
                      @error("codesource")
                      {{$message}}
                      @enderror
                        <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="contenus" rows="3"
                                class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a comment...(*)" required>{{old('contenus')}}</textarea>
                        </div>
                        @error("contenus")
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium">Erreur !</span> {{$message}}
                            </div>
                          </div>
                      @enderror
                
                      <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea name="codesource" rows="3"
                            class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Code Source (Facultatif)" >{{old('codesource')}}</textarea>
                    </div>
                    @error("codesource")
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Erreur !</span> {{$message}}
                        </div>
                      </div>
                  @enderror
                        
                
                        @auth
                        <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Commenter
                    </button>   
                        @endauth
                        @guest
                          <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                              <a href="{{route('login')}}">Se connecter avant de commenter cette astuce</a>
                          </div>
                        @endguest
                    </form>
                    @foreach ($commentaires as $comm )
                      @php
                          $count++;
                          $k++;
                      @endphp
                    <article class="p-6 mb-6 text-base bg-gray-800 rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                         
                
                                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-200 dark:text-white">
                                  @if ($comm->user->image)
                                  <img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        src="{{$comm->user->imageUrls()}}"
                                        alt="{{$comm->user->name}}">{{$comm->user->name}}</p>
                                      <p class="text-sm text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $comm->created_at->diffForHumans() }}</time>
                                      
                                        @else
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}">
                              
                                        <a  id="exemple">
                                            <i class="bi bi-person-circle s "></i>
                              
                                        </a>
                                      </button>
                                  
                                        @endif</p>
                            </div>
                            @auth
                              @if ($comm->user->id == Auth::user()->id)
                            <button id="dropdownComment{{ $k }}Button" data-dropdown-toggle="dropdownComment{{ $k }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-gray-800 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-750 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                      <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                  </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment{{ $k }}"
                                class="hidden z-10 w-36 bg-gray-800 rounded divide-y divide-gray-800 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-100 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="{{route('edit.comm',['comment'=>$comm->id])}}"
                                            class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('deletecomm',['id'=>$comm->id])}}"
                                            class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">Supprimerr</a>
                                    </li>
                                   
                                </ul>
                            </div>
                            @endif
                          @endauth
                        </footer>
                        <p>
                          {{$comm->contenus}}
                
                              @if ($comm->codesource)
                                <pre style="" class="border border-5  mt-5 " ><code class="{{$class}}">{{($comm->codesource)}}</code></pre>
                              @endif
                        </p>
                        
                    </article>
                
                    @endforeach
                    <div class="mb-6">
                      {{$commentaires->links()}}
                    </div>
                

                    
                    </section>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <div class="bg-slate-900 rounded-xl shadow-xl p-6">
                <h4 class="text-xl font-bold text-white mb-6">
                    Autres astuces du genre
                </h4>
               
                <div class="space-y-4">
                    @forelse ($ast1 as $t)
                        <a href="{{route('astuces.shoastuce',['nom'=>$t->slug,'astuce'=>$t->id])}}"
                            class="block group hover:bg-slate-800 p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 text-indigo-400">
                                    {!! $astuce->category->svg !!}
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-white font-medium group-hover:text-indigo-400 transition-colors">
                                        {{$t->titre}}
                                    </h3>
                                    <p class="text-slate-400 text-sm mt-1">
                                        {{Str::limit($astuce->description,150)}}
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
                                        <h3 class="text-white font-medium">{{$d->titre}}</h3>
                                        <p class="text-slate-400 text-sm">Brief description</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

  <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-slate-900   rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-4 md:p-5 text-center">
                  <h5 class="text-xl font-bold text-white">Profile</h5>
              </div>
                <div class="bg-slate-900 rounded-xl p-6 max-w-lg mx-auto">
                  
                 
                  <div class="flex gap-6">
                      <div class="flex-shrink-0">
                          @if($astuce->users->image)
                              <img src="{{$astuce->users->imageUrls()}}"
                                  class="w-32 h-32 rounded-full object-cover"
                                  alt="{{$astuce->users->name}}">
                          @else
                              <div class="w-32 h-32 rounded-full bg-slate-700 flex items-center justify-center">
                                  <svg class="w-[98px] h-[98px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  
                                  
                              </div>
                          @endif
                      </div>
                     
                      <div class="flex-1 text-slate-300 space-y-2">
                          <p>Nom: <span class="text-white font-medium">{{$astuce->users->name}}</span></p>
                          <p>Nous a rejoint le: <span class="text-white font-medium">{{$astuce->users->created_at->formatLocalized(' %d %B %Y')}}</span></p>
                          <p class="text-sm">Nombre d'abonnés: {{$astuce->users->subscribers()->count()}}</p>
                          <a href="{{route('user.profil', ['user'=>$astuce->users,'nom'=>Str::slug($astuce->users->name,'-')])}}"
                              class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition-colors">
                              Voir le profil
                          </a>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      </div>
  </div>
  



  

@endsection