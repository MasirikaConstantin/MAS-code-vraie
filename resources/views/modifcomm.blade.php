@extends('base')
@section('section','Modifier Votre commentaire')
@section('contenus')
@php
                      $class=null;
                            if($comment->post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($comment->post->categorie_id==2){
                                $class='language-css';
                            }
                            elseif($comment->post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($comment->post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($comment->post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($comment->post->categorie_id==6){
                                $class='language-java';
                            }
                            //endif
                      @endphp
<section class="bg-gray-900 py-8  antialiased adrks:bg-gray-900 md:py-16">
<ul class="list-none space-y-4">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md shadow-md">
      {{ session('success') }}
    </div>
    @endif

    <div class="w-full h-0.5 bg-gray-200 my-6 rounded-md"></div>

    <li class="shadow-lg bg-gray-800 rounded-lg p-6 border-t border-gray-300 space-y-4">
       
        @if (Auth::user()->image)
                        <img class="mr-4 w-16 h-16 rounded-full border-2 border-indigo-500" src="{{ Auth::user()->imageUrls() }}" alt="{{Auth::user()->name}}">
                    @else
                        <div class="w-12 h-12 rounded-full bg-slate-700 flex items-center justify-center">
                            <svg class="w-[48px] h-[48px] text-gray-800 adrks:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </div>
                    @endif
        
        <p class="mt-4 text-lg text-gray-200 font-semibold">{!! $comment->contenus !!}</p>

        @if ($comment->codesource)
        <pre class="border border-gray-300 bg-gray-50 p-4 mt-5 rounded-md shadow-inner overflow-x-auto"><code class="{{ $class }}">{!! $comment->codesource !!}</code></pre>
        @endif

        <hr class="my-4 border-gray-200">

        <p class="text-sm text-gray-500">Publié le : {{ $comment->updated_at->formatLocalized('%d %B %Y') }}</p>
    </li>

</ul>

<form method="post" class="mt-10 bg-gray-800 space-y-6">
    @csrf
    <div class="flex bg-gray-500 flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6 bg-gray-100 p-6 rounded-lg shadow-md">
        
        <div class="flex-1 bg-gray-500 ">
            <label for="exampleFormControlTextarea1" class="block text-center font-medium text-gray-700 mb-2">Votre Message</label>
            @error("contenus")
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
              {{ $message }}
            </div>
            @enderror
            <textarea class="w-full p-4 bg-gray-300 text-gray-800 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="contenus" id="exampleFormControlTextarea1" rows="5">{{ $comment->contenus }}</textarea>
        </div>

        <div class="flex-1">
            <label for="exampleFormControlTextarea2" class="block text-center font-medium text-gray-700 mb-2">Code Source (si possible)</label>
            @error("codesource")
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
                    {{ $message }}
                </div>
            @enderror
            <textarea class="w-full p-4 bg-gray-300 border text-gray-800 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="codesource" id="exampleFormControlTextarea2" rows="5">{{ $comment->codesource }}</textarea>
        </div>

    </div>

    <div class="text-center mb-6">
        <button type="submit" class="bg-indigo-600 mb-6 text-white px-6 py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Mettre à jour
        </button>
    </div>
</form>

@endsection