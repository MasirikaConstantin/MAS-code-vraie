@extends('base')
@if(Auth::user()==$user)
  @section('section',"Moi")
@else
  @section('section',$user->name)
@endif
@section('contenus')
@php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
@endphp

<div class="container  mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Profil sidebar -->
    <div class="lg:col-span-4  space-y-6">

      <div class="bg-gray-800 rounded-xl p-6 backdrop-blur-lg border border-indigo-500/20 hover:border-indigo-500/40 transition-all duration-300" style="animation: glow 3s infinite">
        <!-- Photo de profil -->
        <div class="flex justify-center mb-6">
            @if ($user->image!=null)
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
                

                <div class="">
                  
                    
                      @auth
            @if(Auth::user()!=$user)
              @if ($ubs->count() > 0)
                <div class="mt-4 space-y-2 bg-gray-800">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                    </svg>
                    Abonné
                  </span>
                  <a href="{{route('user.unsubscribe',['user'=>$user])}}"
                     class="inline-flex items-center px-4 py-2 border border-indigo-500 rounded-md text-sm font-medium text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Se désabonner
                  </a>
                </div>
              @else
                <a href="{{route('user.subscribe',['user'=>$user])}}"
                   class="mt-4 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  S'abonner
                </a>
              @endif
            @endif
          @endauth
          @guest
          <div class="mt-4 p-4 rounded-md bg-amber-50 border border-amber-200">
            <p class="text-sm text-amber-700">
              <a href="{{route('login')}}" class="font-medium text-amber-900 hover:text-amber-800">Connectez-vous</a>
              ou
              <a href="{{route('register')}}" class="font-medium text-amber-900 hover:text-amber-800">créez un compte</a>
              pour s'abonner
            </p>
          </div>
          @endguest
                    

          <div class="mt-6 pt-6  border-gray-200">
            <div class="divide-y divide-gray-200">
              <div class="py-3 flex justify-between">
                <dt class="text-sm font-medium text-gray-200">Abonnés</dt>
                <dd class="text-sm font-semibold text-gray-200">{{$user->subscribers()->count()}}</dd>
              </div>
              <div class="py-3 flex justify-between">
                <dt class="text-sm font-medium text-gray-200">Posts</dt>
                <dd class="text-sm font-semibold text-gray-200">{{$user->posts()->count()}}</dd>
              </div>
              @if(Auth::user()!=$user)
              <div class="py-3 flex justify-between">
                <dt class="text-sm font-medium text-gray-200">Commentaires</dt>
                <dd class="text-sm font-semibold text-gray-200">{{$user->com()->count()}}</dd>
              </div>
              @endif
            </div>
          </div>

          
                </div>
            </div>
        </div>
    </div>


      
    </div>

    <!-- Posts -->
    <div class="lg:col-span-8 space-y-6">
      @foreach ($posts as $post)
      @php
      $titre = str_replace(' ','-',$post->slug);
      @endphp
      <article class="bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
        <div class="p-6 bg-gray-800">
          <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-300 hover:text-indigo-600">
              {{$post->titre}}
            </h2>
            @if ($post->created_at != $post->updated_at)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
              <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 12a1 1 0 11-2 0 1 1 0 012 0zm0-8a1 1 0 00-1-1 1 1 0 00-1 1v4a1 1 0 102 0V6z"/>
              </svg>
              Modifié le {{$post->updated_at->formatLocalized(' %d %B %Y')}} à {{$post->updated_at->format(' H:i')}}
            </span>
            @endif
          </div>

          <p class="mt-4 text-gray-200">
            {{$post->contenus}}
          </p>

          @if ($post->codesource)
          <div class="mt-6 bg-gray-800 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm"><code class="@if($post->categorie_id==1)language-csv @elseif($post->categorie_id==2)language-css @elseif($post->categorie_id==3)language-php @elseif($post->categorie_id==4)language-javascript @elseif($post->categorie_id==5)language-python @elseif($post->categorie_id==6)language-java @endif">{{$post->codesource}}</code></pre>
          </div>
          @endif

          @if ($post->image)
          <div class="mt-6">
            <a class="test-popup-link block aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
              <img data-fancybox
                   data-caption="{{$post->titre}}"
                   class="w-full h-full object-cover transform hover:scale-105 transition"
                   src="{{$post->imageUrl()}}" />
            </a>
          </div>
          @endif

          <div class="mt-6 flex flex-wrap gap-2">
            @if ($post->category)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
              {{$post->category->titre}}
            </span>
            @endif

            @foreach ($post->tags as $tag)
            <span class="px-3 py-1 rounded-full text-white bg-gradient-to-r from-indigo-600 to-indigo-500 shadow-lg shadow-indigo-500/20
                       ">
              {{$tag->nom}}
            </span>
            @endforeach
          </div>

          <div class="mt-6 flex items-center justify-between">
            <div class="flex items-center space-x-4">
              <img class="h-10 w-10 rounded-full" src="{{$post->users->imageUrls()}}" alt="">
              <div>
                <p class="text-sm font-medium text-gray-100">{{$post->users->name}}</p>
                <p class="text-sm text-gray-500">{{$post->updated_at->formatLocalized(' %d %B %Y')}}</p>
              </div>
            </div>

            <div class="flex items-center space-x-4">
              <span class="flex items-center text-sm text-gray-500">
                <svg class="w-5 h-5 mr-1.5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                  <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                </svg>
                {{ $post->views_count }} {{ $post->views_count > 1 ? 'vues' : 'vue' }}
              </span>

              <a href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$post])}}"
                 class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Lire la suite
                <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </article>
      @endforeach

      <div class="mt-6">
        {{$posts->links()}}
      </div>
    </div>
  </div>
</div>

@endsection