@extends('admin.base')
@section('section','Admin Astuce')
@section('titre', 'Admin Astuce')
@section('contenus')

@php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
@endphp

<style>
.mes {
    @apply inline-block text-black align-middle rounded-lg font-bold overflow-hidden;
}
.mes svg {
    @apply w-auto h-[60px];
}
@media (max-width: 500px) {
    .mes {
        @apply border-3 border-black/75;
    }
    .mes svg {
        @apply h-[100px];
    }
}
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Contenu Principal -->
        <div class="lg:w-2/3">
            <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden mb-8">
                <!-- Section Média -->
                <div class="p-6">
                    @if($astuce->video)
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class="w-full" 
                                    src="{{$astuce->video}}" 
                                    title="YouTube video player" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                    @elseif($astuce->image)
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{$astuce->imageUrlAstuce()}}" 
                                 class="w-full h-auto object-cover" 
                                 alt="">
                        </div>
                    @endif
                </div>

                <!-- Contenu de l'astuce -->
                <div class="prose prose-invert max-w-none px-6">
                    @php echo $astuce->contenus @endphp
                </div>

                <!-- Métadonnées -->
                <div class="p-6 bg-gray-800/50 mt-6">
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Catégorie : <span class="font-bold text-blue-400">{{$astuce->category->titre}}</span>
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-gray-300">Tags :</span>
                            @foreach ($astuce->tags as $tag)
                                <span class="px-3 py-1 text-sm rounded-full bg-{{$tag->couleur}}-500/10 text-{{$tag->couleur}}-400 border border-{{$tag->couleur}}-500/20">
                                    {{$tag->nom}}
                                </span>
                            @endforeach
                        </div>
                        @if ($astuce->video)
                            <p class="text-gray-300">
                                Lien : <span class="text-blue-400">{{$astuce->video}}</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <h4 class="text-xl font-bold text-gray-100 mb-4">Actions</h4>
                    
                    <!-- État -->
                    <div class="bg-gray-800 rounded-lg p-4 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-gray-100">État</p>
                                <p class="text-sm text-gray-400">
                                    {{$astuce->etat==1 ? 'Astuce acceptée' :'En attente de validation'}}
                                </p>
                            </div>
                            <span class="px-3 py-1 rounded-full {{ $astuce->etat==1 
                                ? 'bg-green-500/10 text-green-400 border border-green-500/20' 
                                : 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20' }}">
                                {{$astuce->etat==1 ? 'Posté' : 'En attente'}}
                            </span>
                        </div>
                    </div>

                    <!-- Durée -->
                    <div class="bg-gray-800 rounded-lg p-4 mb-4">
                        <p class="text-gray-300">
                            Mise à jour il y a : <span class="font-bold text-blue-400">{{$maduree}}</span>
                        </p>
                    </div>

                    <!-- Boutons d'action -->
                    @if ($astuce->etat==0)
                        <div class="bg-green-500/10 border border-green-500/20 rounded-lg p-4">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-green-400">Action</span>
                                <a href="{{route('admin.gereredit',['astuce'=>$astuce->id, 'donnee'=>1])}}" 
                                   class="px-4 py-2 bg-gradient-to-r from-blue-500 to-green-500 text-white rounded-lg hover:from-blue-600 hover:to-green-600 transition-all duration-300">
                                    Mettre en ligne
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-red-400">Action</span>
                                <a href="{{route('admin.gereredit',['astuce'=>$astuce->id,'donnee'=>0])}}"
                                   class="px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg hover:from-red-600 hover:to-pink-600 transition-all duration-300">
                                    Mettre en attente
                                </a>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mt-4 bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-lg">
                            {{session('success')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection