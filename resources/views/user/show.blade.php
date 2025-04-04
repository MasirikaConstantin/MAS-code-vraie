<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $post->titre }} - Mas Code Product</title>
<meta name="description" content="{{ $post->description }}" />
<meta name="keywords" content="{{ implode(', ', $post->tags->pluck('nom')->toArray()) }}" />
<meta name="author" content="{{ mb_strtoupper($post->users->name, 'UTF-8') }}" />
<meta name="robots" content="all">
<meta property="og:locale" content="fr_FR" />
<meta property="og:site_name" content="Mas Code Product" />
<meta name="msvalidate.01" content="F61941C03B23140DCAE7F648A3DEE7E6" />
<meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}">
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ mb_strtoupper($post->titre, 'UTF-8') }}" />
<meta property="og:description" content="{{ $post->description }}" />
<meta property="og:url" content="{{route('user.show',['nom'=>Str::lower($post->slug)])}}" />
<meta property="og:image" content="{{ $post->imageUrl() ? $post->imageUrl() : asset('mas product.png') }}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="article:author" content="{{ mb_strtoupper($post->users->name,'UTF-8') }}" />
<meta property="article:tag" content="{{ implode(', ', $post->tags->pluck('nom')->toArray()) }}" />
<meta property="article:published_time" content="{{ $post->created_at->toIso8601String() }}" />
<meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@Mascodeproduct" />
<meta name="twitter:creator" content="{{ '@'.$post->users->name }}" />
<meta name="twitter:title" content="{{ $post->titre }}" />
<meta name="twitter:description" content="{{ $post->description }}" />
<meta name="twitter:image" content="{{ $post->imageUrl() ? $post->imageUrl() : asset('mas product.png') }}" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Mas Code Product">
<meta name="msapplication-TileImage" content="{{ asset('mas product.png') }}">
<meta name="msapplication-TileColor" content="#E11308">

@extends('base')
@section('contenus')
@section('section',"")
@section('titre',$post->titre)
@php
    date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
                      $count=0;
                      $count1="0";
                        $k =0;
                      $classa=null;
                      if($post->categorie_id==1){
                                $classa='language-csv';
                            }
                            elseif($post->categorie_id==33){
                                $classa='language-css';
                            }
                            elseif($post->categorie_id==3){
                                $classa='language-php' ;
                            }
                            elseif($post->categorie_id==4){
                                $classa='language-javascript';
                            }
                            elseif($post->categorie_id==5){
                                $classa='language-python';
                            }
                            elseif($post->categorie_id==6){
                                $classa='language-java';
                            }else{
                              $classa='language-html';

                            }
@endphp
    
 

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24  adrks:bg-gray-900 antialiased">
  
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
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

                    @if ($post->user->image)
                        <img class="mr-4 w-16 h-16 rounded-full border-2 border-indigo-500" src="{{$post->user->imageUrls()}}" alt="{{$post->user->name}}">
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
                                            @if($post->users->image)
                                                <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300" 
                                                     src="{{$post->user->imageUrls()}}" 
                                                     alt="{{$post->user->name}}"
                                                />
                                            @else
                                                <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300"
                                                     src="{{asset('téléchargement.png')}}" 
                                                     alt="Default profile"
                                                />
                                            @endif
                                            <div class="absolute inset-0 rounded-full bg-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        </div>
                  
                                        <!-- User Info Section -->
                                        <div class="flex-1 space-y-4">
                                            <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                                                {{$post->user->name}}
                                            </h3>
                  
                                            <p class="text-violet-200 font-medium">
                                                Membre depuis 
                                                <span class="text-pink-200 font-semibold">
                                                    {{$post->user->created_at->diffForHumans( )}}
                                                </span>
                                            </p>
                  
                                            <p class="text-violet-300/90">
                                                <span class="text-sm flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                                    </svg>
                                                    {{$post->user->subscribers()->count()}} abonnés
                                                </span>
                                            </p>
                  
                                            <a href="{{route('user.profil', ['user'=>$post->user,'nom'=>(Str::slug($post->user->name,'-'))])}}"
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
                          <a href="#" rel="author" class="text-xl font-bold text-gray-200 adrks:text-white">{{$post->user->name}}</a>
                          
                         
                          <p class="text-base text-gray-400 adrks:text-gray-400">
                            <time pubdate datetime="{{ $post->created_at }}" title="{{ $post->created_at->translatedFormat('d F Y') }}">
                              {{ $post->created_at->diffForHumans() }}
                            </time>
                          </p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-200 lg:mb-6 lg:text-4xl adrks:text-white">{{$post->titre}}</h1>
          </header>
          @if ($post->image)
          <div class="items-center" style="display: flex; justify-content: center; align-items: center; align-content: center !important; margin-bottom: -20">

          <figure><img data-fancybox class="w-[450px] h-[450px] rounded rounded-lg" src="{{ $post->imageUrl() }}" alt="{{$post->titre}}">
            </div>
        </figure>
          @endif
          <h4 class=" text-white text-l">{!! $post->contenus !!}</h4>
          <p>
                @if ($post->codesource)
                  <pre style="" class="border border-5  mt-5 " ><code class="{{$classa}}">{{($post->codesource)}}</code></pre>
                @endif
          </p>

<div class="">


  <div class="flex flex-col space-y-4">
    <!-- Reactions Container -->
    <div class="flex items-center gap-2 flex-wrap">
        <span class="text-slate-400">Tags:</span>
        @foreach ($post->tags as $tag)
        
      @if ($tag->status == false)
                        <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20">
                            {{$tag->nom}}
                        </span>
                        @endif
        @endforeach
    </div>
    <div class="flex items-center space-x-6 bg-gray-800/30 backdrop-blur-sm rounded-xl p-4 hover:bg-gray-800/40 transition-all">

        


        @auth
            <!-- Likes -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('user.reaction', ['post'=>$post->id, 'reaction'=>1]) }}"
                   class="group relative">
                    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-900 text-white text-xs py-1 px-2 rounded-md">
                        J'aime
                    </div>
                    @if(Auth::user()->reactions()->where('post_id', $post->id)->where('reaction', '=', 1)->exists())
                        <svg class="w-6 h-6 text-purple-500 transform hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-gray-400 hover:text-purple-500 transform hover:scale-110 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                    @endif
                </a>
                <span class="text-gray-300 font-medium">
                    {{ $post->reactions()->where('reaction', '1')->count() }}
                </span>
            </div>

            <!-- Dislikes -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('user.reaction', ['post'=>$post->id, 'reaction'=>0]) }}"
                   class="group relative">
                    <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-900 text-white text-xs py-1 px-2 rounded-md">
                        Je n'aime pas
                    </div>
                    @if(Auth::user()->reactions()->where('post_id', $post->id)->where('reaction', '=', 0)->exists())
                        <svg class="w-6 h-6 text-red-500 transform hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z" />
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-gray-400 hover:text-red-500 transform hover:scale-110 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                        </svg>
                    @endif
                </a>
                <span class="text-gray-300 font-medium">
                    {{ $post->reactions()->where('reaction', '0')->count() }}
                </span>
            </div>
        @else
            <!-- Guest View -->
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                    <span class="text-gray-300 font-medium">
                        {{ $post->reactions()->where('reaction', '1')->count() }}
                    </span>
                    <span class="text-gray-400 text-sm">Positive</span>
                </div>

                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                    </svg>
                    <span class="text-gray-300 font-medium">
                        {{ $post->reactions()->where('reaction', '0')->count() }}
                    </span>
                    <span class="text-gray-400 text-sm">Négative</span>
                </div>
            </div>
        @endauth
    </div>

    <!-- Views Counter -->
    <div class="flex items-center space-x-2 text-gray-400">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        <span class="text-sm">
            {{ $post->views_count }} 
            {{ $post->views_count > 1 ? 'vues' : 'vue' }}
        </span>
    </div>
</div>


</div>

          
    <div class="">
        @livewire('commenter-post', ['postId' => $post->id])
    </div>
      </article>
  </div>
</main>





<aside aria-label="Related articles" class="py-8 lg:py-15 bg-gray-800 adrks:bg-gray-800">
  <div class="px-4 mx-auto max-w-screen-xl">
      <h2 class="mb-8 text-2xl font-bold text-gray-100 adrks:text-white">{{__("Autre")}}</h2>
      <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
          @forelse($autres as $aut)

          <article class="max-w-xs">
            @if($aut->image)
                <a href="{{route('user.show',['nom'=>Str::lower($aut->slug)])}}">
                  <img src="{{$aut->imageUrl()}}" class="mb-5 rounded-lg" alt="Image 1">
              </a>

              
            @else
            

            <div class="h-32 bg-gradient-to-br from-indigo-600 to-{{$aut->category->couleur}} flex items-center justify-center">
              <div class="text-center">
                  <div class="w-12 h-12 mx-auto">
                      {!! $aut->category->svg !!}
                  </div>
                  <h3 class="text-sm font-bold text-white mt-2">{{ $aut->category->titre }}</h3>
              </div>
          </div>
            @endif

            
            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-200 adrks:text-white">
                <a href="{{route('user.show',['nom'=>Str::lower($aut->slug)])}}"> {{Str::limit($aut->titre,20)}} </a>
            </h2>
            <p class="mb-4 text-gray-100 adrks:text-gray-400">{{Str::limit($aut->contenus,100)}}</p>
            <a href="{{route('user.show',['nom'=>Str::lower($aut->slug)])}}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 adrks:text-primary-500 hover:no-underline">
                Lire la suite
            </a>
        </article>
        
          @empty
          @endforelse
      </div>
  </div>
</aside>













@endsection