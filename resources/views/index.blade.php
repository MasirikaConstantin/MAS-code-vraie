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
        <a href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$post])}}"
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
  <section class="container mx-auto"  >

    <div class="container" >

      <h1 class="text-4xl font-bold adrks:text-white mb-4" > <i class="bi bi-sliders"></i> Nos sujets</h1>

      @foreach ($categories as $category )
        <a type="button" href="{{route('tous',['category_id' => $category->id])}}" title="{{$category->titre}}" data-bs-content="{{$category->description}}" data-bs-placement="top" data-bs-trigger="hover" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center adrks:focus:ring-gray-600 adrks:bg-gray-800 adrks:border-gray-700 adrks:text-white adrks:hover:bg-gray-700 me-2 mb-2">
          @if ($category->image)
          <div class="w-6 h-5 me-2 -ms-1">
            @php
              echo $category->imageUrlcat()
            @endphp
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
  </section>

  
  





















  <!-- Section Formations -->
<section class="py-20 bg-gray-900">
  <div class="container mx-auto px-4">
      <!-- En-tête de section -->
      <div class="text-center mb-16">
          <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4">
              Formez-vous aux Technologies de Demain
          </h2>
          <p class="text-gray-400 text-lg max-w-2xl mx-auto">
              Développez vos compétences avec nos formations en ligne certifiantes. 
              Explorez des domaines innovants et restez à la pointe de la technologie.
          </p>
      </div>

      <!-- Grille des formations -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Carte Formation Web -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">Développement Web</h3>
              <p class="text-gray-400 mb-4">Frontend, Backend, Full-Stack</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">HTML/CSS</span>
                  <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">JavaScript</span>
                  <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">PHP</span>
              </div>
          </div>

          <!-- Carte Formation Mobile -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">Développement Mobile</h3>
              <p class="text-gray-400 mb-4">iOS, Android, Cross-platform</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Flutter</span>
                  <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">React Native</span>
                  <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Swift</span>
              </div>
          </div>

          <!-- Carte IA & Machine Learning -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">IA & Machine Learning</h3>
              <p class="text-gray-400 mb-4">Deep Learning, Data Science</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Python</span>
                  <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">TensorFlow</span>
                  <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">PyTorch</span>
              </div>
          </div>

          <!-- Carte Cybersécurité -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">Cybersécurité</h3>
              <p class="text-gray-400 mb-4">Sécurité Web, Ethical Hacking</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Pentesting</span>
                  <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Cryptographie</span>
                  <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Forensics</span>
              </div>
          </div>

          <!-- Carte Cloud Computing -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">Cloud Computing</h3>
              <p class="text-gray-400 mb-4">AWS, Azure, Google Cloud</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full text-sm">AWS</span>
                  <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Docker</span>
                  <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Kubernetes</span>
              </div>
          </div>

          <!-- Carte Blockchain -->
          <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
              <div class="mb-4">
                  <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
              </div>
              <h3 class="text-xl font-bold text-white mb-2">Blockchain</h3>
              <p class="text-gray-400 mb-4">Web3, Smart Contracts</p>
              <div class="flex flex-wrap gap-2">
                  <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Ethereum</span>
                  <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">Solidity</span>
                  <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Web3.js</span>
              </div>
          </div>
      </div>

      <!-- Bouton Voir plus -->
      <div class="text-center mt-12">
          <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold hover:opacity-90 transition-opacity">
              <!--Découvrir toutes nos formations--> À Vénir bientôt Contactez nous pour en savoir plus
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
              </svg>
          </a>
      </div>
  </div>
</section>
  


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