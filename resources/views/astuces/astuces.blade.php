@extends('base')
@section('section','Toutes les astuces')
@section('titre','Astuces')

@section('contenus')
    <div class="max-w-7xl mx-auto">
        <!-- Bouton Publier -->
        <a href="{{route('astuces.new')}}"
           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg text-white font-medium shadow-lg hover:shadow-purple-500/25 transform hover:scale-105 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Publier une astuce
        </a>

        <!-- Formulaire de recherche -->
        <form action="" method="get" class="mt-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="relative">
                    <input type="text" name="titre" value="{{$input['titre']??''}}"
                           class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all"
                           placeholder="Titre d'une astuce">
                </div>

                <div class="relative">
                    <input type="text" name="contenus" value="{{$input['contenus'] ?? ''}}"
                           class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all"
                           placeholder="Rechercher dans le contenu">
                </div>

                <div class="relative">
                    <select name="category_id" onchange="this.form.submit()"
                            class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @selected(old('category_id', $input['category_id']?? "") == $category->id)>
                                {{$category->titre}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="h-12 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg hover:shadow-lg hover:shadow-purple-500/25 transform hover:scale-105 transition-all">
                    Rechercher
                </button>
            </div>
        </form>

        <!-- Liste des astuces -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            @forelse ($astuces as $astuce)
                <div class="bg-gray-800/30 backdrop-blur-xl rounded-xl overflow-hidden shadow-xl hover:shadow-purple-500/10 transition-all">
                    <div class="flex flex-col md:flex-row">
                        <div class="p-6 flex-1">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">
                                    {{$astuce->category->titre}}
                                </span>
                                <span class="text-gray-400 text-sm">
                                    {{$astuce->created_at->formatLocalized(' %d %B %Y')}}
                                </span>
                            </div>
                           
                            <h3 class="text-xl font-bold text-white mb-2">{{$astuce->titre}}</h3>
                            <p class="text-gray-400 mb-4">Par {{$astuce->users->name}}</p>
                            <p class="text-gray-300 mb-4">{{Str::limit($astuce->contenus, 200)}}</p>
                           
                            <a href="{{route('astuces.shoastuce',['nom'=>$astuce->slug,'astuce'=>$astuce->id])}}"
                               class="text-purple-400 hover:text-purple-300 transition-colors">
                                Lire la suite →
                            </a>
                        </div>

                        <div class="w-full md:w-48 h-48 relative">
                            @if($astuce->image)
                                <img src="{{$astuce->imageUrlAstuce()}}"
                                     class="w-full h-full object-cover"
                                     alt="{{$astuce->titre}}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-800">
                                    {!! $astuce->category->svg !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 bg-red-500/10 text-red-400 p-4 rounded-lg">
                    Aucune publication ne correspond à votre recherche
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{$astuces->links()}}
        </div>

        <!-- Catégories -->
        <h3 class="text-2xl font-bold text-white mt-12 mb-6">Trier les catégories</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($categories as $category)
                <div class="bg-gray-800/30 backdrop-blur-xl rounded-xl overflow-hidden hover:shadow-xl transition-all">
                    <div class="flex p-4">
                        @if ($category->image)
                            <img src="{{$category->imageUrlcat()}}"
                                 class="w-24 h-24 object-cover rounded-lg"
                                 alt="{{$category->titre}}">
                        @else
                            <div class="w-24 h-24 flex items-center justify-center">
                                {!! $category->svg !!}
                            </div>
                        @endif

                        <div class="ml-4 flex-1">
                            <h4 class="text-lg font-semibold text-white mb-2">{{$category->titre}}</h4>
                            <p class="text-gray-400 text-sm mb-4">{{Str::limit($category->description, 200)}}</p>
                            <a href="{{route('astuces',['category_id' => $category->id])}}"
                               class="text-purple-400 hover:text-purple-300 transition-colors">
                                En savoir plus →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection