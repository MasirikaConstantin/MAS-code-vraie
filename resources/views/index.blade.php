@extends('base')

@section('contenus')

<section class="pt-4 linear-g-w-2" >

  <div class="container " >


    <style>
      .mes{
          display: inline-block;
      
      color: #000;
      vertical-align: middle;
      
      border: 3px solid #0e0c0cc4;
      border-radius: 5px;
      font-weight: bolder;
      overflow: hidden;
        }
            .mes svg{
              width: 300px;
              height: 200px;
            }
          
          
            @media (max-width: 500px){
                  .titre{
                  font-size: 22px
                    
                  }
                  .mes{
                  display: inline-block;
              
              color: #000;
              vertical-align: middle;
              
              border: 3px solid #0e0c0cc4;
              border-radius: 5px;
              font-weight: bolder;
              overflow: hidden;
                }
            .mes svg{
              width: 100px;
              height: 200px;
            }
                }
                @media (max-width: 371px){
                  .espa{
                    
                    margin-bottom: 1rem !important;
                          
                        }
                }
                @media (max-width: 925px){
                  .titre{
                  font-size: 22px
                    
                  }
                  
                  .mon{
                      max-height: 100%;
                      max-width: 100%;
                      width: 100px!important;
                      object-fit: cover;
                      height: 150px!important;
                      object-fit: cover;
                      border-radius: 12px;
                  }
          
          
          
                }
          .sks{
            position: relative;
            display: inline-block;
          }
          .montxt{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(109, 100, 100, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: green;
          
          }
          .pos{
            position: relative;
              display: block;
              height: 280px;
          
              box-sizing: border-box;
          }
          @media (min-width: 768px) {
            .col-md-3 {
              flex: 0 0 auto;
              width: 30%;
            }
          }
          .bi {
                            vertical-align: -.125em;
                            fill: currentColor;
                            font-size: 40px;

                          }
                        
  
  </style>


    <div class="d-flex flex-column flex-md-row" >

      <h1 class="text-4xl font-bold adrks:text-white mb-4" ><i class="bi bi-patch-question"></i> Les Astuces récentes</h1>

      
      
      
    </div>
  
<div class="container mx-auto px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

        @foreach ($astuces as $astuce)
            @php
                $titre = str_replace(' ', '-', $astuce->slug);
              //echo( $astuce->imageUrlAstuce() );
            @endphp
            
                  <!-- Card 1 -->
                  <a href="{{ route('astuces.shoastuce', ['nom' => $astuce->slug, 'astuce' => $astuce->id]) }}" 
                     class="block group relative h-[280px] bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                      <!-- Category Badge -->
                      <div class="absolute top-3 left-3 z-10">
                          <span class="px-3 py-1 text-xs font-semibold bg-indigo-500/30 text-indigo-300 rounded-full backdrop-blur-sm">
                              <i class="fas fa-folder mr-1"></i>
                              {{ $astuce->category->titre }}
                          </span>
                      </div>
          
                      <!-- Image Container -->
                      @if($astuce->image)
                      <div class="h-32 overflow-hidden">
                          <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300" 
                               src="{{ $astuce->imageUrlAstuce() }}" 
                               alt="Cover">
                      </div>
                      @else
                      
                      <!-- Fallback Container -->
                      <div class="h-32 bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center">
                          <div class="text-center">
                              <div class="w-12 h-12 mx-auto">
                                  {!! $astuce->category->svg !!}
                              </div>
                              <h3 class="text-sm font-bold text-white mt-2">{{ $astuce->category->titre }}</h3>
                          </div>
                      </div>
                      @endif
          
                      <!-- Content -->
                      <div class="p-4">
                          <h2 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors mb-2 line-clamp-2">
                              {{ $astuce->titre }}
                          </h2>
                          <p class="text-slate-300 text-sm line-clamp-3">
                            {{Str::limit($astuce->description,76)}}

                          </p>
          
                          <!-- Footer -->
                          <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between">
                              <div class="flex mt-8 items-center space-x-2 text-slate-400">
                                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                  </svg>
                                  <span class="text-xs">{{ $astuce->created_at->diffForHumans() }}</span>
                              </div>
                              
                              <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-500/20 text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-300">
                                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                  </svg>
                              </span>
                          </div>
                      </div>
                  </a>
          
  
        @endforeach
      </div>
    </div>
    </div>
    
      

      
    </div>


      <div class="container mx-auto" >

        <a href="{{route('astuces')}}"  class="text-gray-900 mt-3 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-500 me-2 mb-2">
          <svg class="w-6 h-6 text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
          </svg>
          
          Voir toutes les astuces
        </a>

        <a href="{{route('astuces.new')}}" class="text-gray-900 mt-5 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-500 me-2 mb-2">
          
          <svg class="w-6 h-6 text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
          </svg>
          Publier une astuce
        </a>

        
      </div>

    <div class="container mx-auto px-4 mb-4" >

      <h1 class="text-4xl font-bold adrks:text-white mb-4" ><i class="bi bi-patch-question"></i> Les Questions récentes</h1>

      
      
      
    </div>
    
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

      @foreach ($posts as $post )
        @php
          $titre= str_replace(' ','-',$post->slug)
        @endphp
      




        <!-- Card 1 -->
        <a href="{{route('user.show',['nom'=>Str::lower($titre)])}}"
          class="block group relative h-[280px] bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
           <!-- Category Badge -->
           <div class="absolute top-3 left-3 z-10">
               <span class="px-3 py-1 text-xs font-semibold bg-indigo-500/30 text-indigo-300 rounded-full backdrop-blur-sm">
                   <i class="fas fa-folder mr-1"></i>
                   {{ $post->category->titre }}
               </span>
           </div>

           <!-- Image Container -->
           @if($post->image)
           <div class="h-32 overflow-hidden">
               <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300" 
                    src="{{ $post->imageUrl() }}" 
                    alt="Cover">
           </div>
           @else
           
           <!-- Fallback Container -->
           <div class="h-32 bg-gradient-to-br from-indigo-600 to-purple-700 flex items-center justify-center">
               <div class="text-center">
                   <div class="w-12 h-12 mx-auto">
                       {!! $post->category->svg !!}
                   </div>
                   <h3 class="text-sm font-bold text-white mt-2">{{ $post->category->titre }}</h3>
               </div>
           </div>
           @endif

           <!-- Content -->
           <div class="p-4">
               <h2 class="text-lg font-bold text-white group-hover:text-indigo-400 transition-colors mb-2 line-clamp-2">
                   {{ $post->titre }}
               </h2>
               <p class="text-slate-300 text-sm line-clamp-3">
                   {{ substr($post->contenus, 0, 76) }}
               </p>

               <!-- Footer -->
               <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between">
                   <div class="flex mt-6 items-center space-x-2 text-slate-400">
                       <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                       </svg>
                       <span class="text-xs">{{ $post->created_at->diffForHumans() }}</span>
                   </div>
                   
                   <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-500/20 text-indigo-400 group-hover:bg-indigo-500 group-hover:text-white transition-all duration-300">
                       <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                       </svg>
                   </span>
               </div>
           </div>
       </a>

      @endforeach
      

      
    </div>


      <div class="d-sm-block" >

        
        <a href="{{route('user.accueil')}}"  class="text-gray-900 mt-5 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-500 me-2 mb-2">
          <svg class="w-6 h-6 text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
          </svg>
          
          Voir  le Forum
        </a>

        <a href="{{route('user.newpost')}}" class="text-gray-900 mt-5 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-500 me-2 mb-2">
          
          <svg class="w-6 h-6 text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
          </svg>
          Poser une question
        </a>
        
      </div>

  </div>

  <!-- Technologies -->
  <section class="container mx-auto mt-3"  >

    <div class="container" >

      <h1 class="text-4xl font-bold adrks:text-white mb-4 ms-6" > <i class="bi bi-sliders"></i> Nos sujets</h1>

      @foreach ($categories as $category )
        <a type="button" href="{{route('tous',['category_id' => $category->id])}}" title="{{$category->titre}}" data-bs-content="{{$category->description}}" data-bs-placement="top" data-bs-trigger="hover" class="text-gray-900 ms-3 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-600 adrks:bg-gray-800 adrks:border-gray-700 adrks:text-white adrks:hover:bg-gray-700 me-2 mb-2">
          @if ($category->image)
          <div class="w-6 h-5 me-2 -ms-1">
            <img src="{{ $category->imageUrlcat()}}" alt="">
          </div>
          @else
          <div class="w-6 h-5 me-2 -ms-1">
            @php
              echo $category->svg
            @endphp
          </div>
          @endif
          {{$category->titre}}
        </a>
      @endforeach
    </div>

    <div class="mt-4">
      <a href="{{route('tous')}}"  class="text-gray-900 mt-5 ms-6 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-500 me-2 mb-2">
        <svg class="w-6 h-6 text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
          <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        </svg>
        
        Trier par Catégories
      </a>
    </div>
  </section>

  
  
@include("formatoin")

</div><!-- #app -->



<!-- Bootstrap, axios, lazysizes, ... -->
<script src="{{asset("app.js")}}" ></script>


<!-- Livewire -->
<script src="{{asset('livewire.js')}}" data-turbo-eval="false" data-turbolinks-eval="false" ></script><script data-turbo-eval="false" data-turbolinks-eval="false" >window.livewire = new Livewire();window.Livewire = window.livewire;window.livewire_app_url = '';window.livewire_token = 'mClbj92Nm5pHeNwzRYgleY2F3MxeaRdEWqd6F1tl';window.deferLoadingAlpine = function (callback) {window.addEventListener('livewire:load', function () {callback();});};let started = false;window.addEventListener('alpine:initializing', function () {if (! started) {window.livewire.start();started = true;}});document.addEventListener("DOMContentLoaded", function () {if (! started) {window.livewire.start();started = true;}});</script>

<script type="text/javascript">

// Livewire : Afficher une alerte
Livewire.on('alert', msg => {
  alert(msg);
});

// Livewire : Masque un modal
Livewire.on('closeModal', el => {
  var modal = new bootstrap.Modal(document.getElementById(el))

  modal.hide();

});

// Tous les popovers
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))

var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})




</script>

@endsection