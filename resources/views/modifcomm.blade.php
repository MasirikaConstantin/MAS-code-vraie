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
<section class="bg-gray-800 py-8 antialiased dark:bg-gray-900 md:py-16">
<ul class="list-none space-y-4">

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md shadow-md">
      {{ session('success') }}
    </div>
    @endif

    <div class="w-full h-0.5 bg-gray-200 my-6 rounded-md"></div>

    <li class="shadow-lg rounded-lg p-6 border-t border-gray-300 space-y-4">
        <a id="exemple" class="d-block text-gray-700 hover:text-gray-900 transition-colors" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <button type="button" class="rounded-full shadow-md p-1 transition-transform transform hover:scale-105" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="{{ Auth::user()->imageUrls() }}" alt="User Avatar" width="50" height="50" class="rounded-full">
            </button>
        </a>
        
        <p class="mt-4 text-lg font-semibold">{{ $comment->contenus }}</p>

        @if ($comment->codesource)
        <pre class="border border-gray-300 bg-gray-50 p-4 mt-5 rounded-md shadow-inner overflow-x-auto">
            <code class="{{ $class }}">{{ $comment->codesource }}</code>
        </pre>
        @endif

        <hr class="my-4 border-gray-200">

        <p class="text-sm text-gray-500">Publié le : {{ $comment->updated_at->formatLocalized('%d %B %Y') }}</p>
    </li>

</ul>

<form method="post" class="mt-10 bg-gray-800 space-y-6">
    @csrf
    <div class="flex bg-gray-200 flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-6 bg-gray-100 p-6 rounded-lg shadow-md">
        
        <div class="flex-1 bg-gray-200 ">
            <label for="exampleFormControlTextarea1" class="block text-center font-medium text-gray-700 mb-2">Votre Message</label>
            @error("contenus")
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
              {{ $message }}
            </div>
            @enderror
            <textarea class="w-full p-4 bg-gray-200 text-gray-800 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="contenus" id="exampleFormControlTextarea1" rows="5">{{ $comment->contenus }}</textarea>
        </div>

        <div class="flex-1">
            <label for="exampleFormControlTextarea2" class="block text-center font-medium text-gray-700 mb-2">Code Source (si possible)</label>
            @error("codesource")
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-2">
                    {{ $message }}
                </div>
            @enderror
            <textarea class="w-full p-4 bg-gray-200 border text-gray-800 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500" name="codesource" id="exampleFormControlTextarea2" rows="5">{{ $comment->codesource }}</textarea>
        </div>

    </div>

    <div class="text-center">
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            Mettre à jour
        </button>
    </div>
</form>

@endsection