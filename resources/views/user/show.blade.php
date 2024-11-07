@extends('base')
@section('contenus')
@section('section',"")
@section('titre',$post->titre)
@php
    date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
                      $count=0;
                      $count1=0;
                        $k =0;
                      $class=null;
                      if($post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($post->categorie_id==33){
                                $class='language-css';
                            }
                            elseif($post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($post->categorie_id==6){
                                $class='language-java';
                            }else{
                              $class='language-html';

                            }
@endphp
    
 

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24  dark:bg-gray-900 antialiased">
  
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full  max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
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
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    @if ($post->user->image)
                    @endif
                      <img class="mr-4 w-16 h-16 rounded-full border-2 border-indigo-500" src="{{$post->user->imageUrls()}}" alt="{{$post->user->name}}">
                      <div>
                          <a href="#" rel="author" class="text-xl font-bold text-gray-200 dark:text-white">{{$post->user->name}}</a>
                          
                         
                          <p class="text-base text-gray-500 dark:text-gray-400">
                            <time pubdate datetime="{{ $post->created_at }}" title="{{ $post->created_at->translatedFormat('d F Y') }}">
                              {{ $post->created_at->diffForHumans() }}
                            </time>
                          </p>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-200 lg:mb-6 lg:text-4xl dark:text-white">{{$post->titre}}</h1>
          </header>
          @if ($post->image)
          <figure><img src="{{ $post->imageUrl() }}" alt="">
            <figcaption>Digital art by Anonymous</figcaption>
        </figure>
          @endif
          <p class="lead">{{ $post->contenus }}</p>
          <p>
                @if ($post->codesource)
                  <pre style="" class="border border-5  mt-5 " ><code class="{{$class}}">{{($post->codesource)}}</code></pre>
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

          
        <section class="not-format mt-6">
              <div class="flex justify-between items-center mb-6">
                  <h2 class="text-lg lg:text-2xl font-bold text-gray-200 dark:text-white">Discussion</h2>
              </div>
              <form method="POST" class="mb-6">
                @csrf

                @auth
                <input hidden type="text" value="{{Auth::user()->id}}" name="user_id"  />
                <input hidden type="text" value="{{$post->id}}" name="post_id"  />
            
                @endauth
                  <div class="py-2 px-4 mb-4 bg-gray-200 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                      <label for="comment" class="sr-only">Your comment</label>
                      <textarea name="contenus" rows="6"
                          class="px-0 w-full bg-gray-200 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
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

                <div class="py-2 px-4 mb-4 bg-gray-200 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                  <label for="comment" class="sr-only">Your comment</label>
                  <textarea name="codesource" rows="4"
                      class="px-0 w-full bg-gray-200 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
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
                  class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                  Commenter
              </button>   
                  @endauth
                  @guest
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                        <a href="{{route('login')}}">Se connecter avant de commenter ce post</a>
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
             
@auth

        <div class="mt-6"  >

          <form method="POST" action="{{route("signalement",["user"=>Auth::user()->id, "post"=>$post->id])}}">
            @csrf
            <input type="text" name="user_id" id="" value="{{Auth::user()->id}}" hidden>
            <input type="text" name="post_id" id="" value="{{$post->id}}" hidden>
            @error('user_id')
                {{$message}}
            @enderror

            @error('post_id')
                {{$message}}
            @enderror

            @error('Raison')
                {{$message}}
            @enderror
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-800 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-gray-400 rounded-t-lg dark:bg-gray-800">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" name="Raison" rows="4" class="w-full px-0 text-sm text-gray-900 bg-gray-400 border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Votre Raison" required ></textarea>
                </div>
                <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Signaler
                    </button>
                    <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                      
                    </div>
                </div>
            </div>
        </form>
        <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Envoyer un signalement en cas d'abus sur ce post.</p>
        
        </div>

@endauth

          </section>
      </article>
  </div>
</main>





<aside aria-label="Related articles" class="py-8 lg:py-15 bg-gray-800 dark:bg-gray-800">
  <div class="px-4 mx-auto max-w-screen-xl">
      <h2 class="mb-8 text-2xl font-bold text-gray-100 dark:text-white">{{__("Autre")}}</h2>
      <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
          @forelse($autres as $aut)

          <article class="max-w-xs">
            @if($aut->image)
                <a href="{{route('user.show',['nom'=>Str::lower($aut->slug),'post'=>$aut])}}">
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

            
            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-200 dark:text-white">
                <a href="{{route('user.show',['nom'=>Str::lower($aut->slug),'post'=>$aut])}}"> {{Str::limit($aut->titre,20)}} </a>
            </h2>
            <p class="mb-4 text-gray-100 dark:text-gray-400">{{Str::limit($aut->contenus,100)}}</p>
            <a href="{{route('user.show',['nom'=>Str::lower($aut->slug),'post'=>$aut])}}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                Lire la suite
            </a>
        </article>
        
          @empty
          @endforelse
      </div>
  </div>
</aside>













@endsection