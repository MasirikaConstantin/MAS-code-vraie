@extends('base')
@section('titre', 'Forum')
@section('contenus')

<div class="container  mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Actualités Technologiques</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($news->articles as $article)
            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="{{ $article->urlToImage ??  asset('mas product.png') }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-400 mb-4">{{ Str::limit($article->description, 100) }}</p>
                    <a href="{{ $article->url }}" target="_blank" class="text-blue-500 hover:underline">Lire la suite</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <a href="{{ request()->url() }}?page={{ $page - 1 }}" class="px-4 py-2 bg-blue-500 me-6 text-white rounded-lg {{ $page <= 1 ? 'hidden' : '' }}">Précédent</a>
        <a href="{{ request()->url() }}?page={{ $page + 1 }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Suivant</a>
    </div>
</div>

@endsection