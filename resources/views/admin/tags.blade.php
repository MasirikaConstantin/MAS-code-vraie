@extends('admin.base')
@section('section',$tag->exists ? 'Editer un Tag' :'Créer un Tag')
@section('titre', $tag->exists ? 'Editer un Tag' :'Créer un Tag')
@section('contenus')

<div class="min-h-screen bg-gray-900 py-8">
  <div class="max-w-2xl mx-auto px-4">
    <form action="{{route($tag->exists ? 'admin.edittag': 'admin.newtag', $tag)}}" method="post" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-xl backdrop-blur-lg border border-gray-700">
      @csrf
      
      <!-- Champ Nom -->
      <div class="relative">
        <input type="text" 
               name="nom" 
               id="nom" 
               value="{{old('nom',$tag->nom)}}" 
               class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200 peer placeholder-transparent">
        <label for="nom" 
               class="absolute left-4 -top-2.5 bg-gray-800 px-2 text-sm text-gray-400 transition-all peer-placeholder-shown:top-3 peer-focus:-top-2.5">
          Titre
        </label>
        @error('nom')
          <div class="mt-2 text-red-500 text-sm">{{$message}}</div>
        @enderror
      </div>

      <!-- Sélecteur de couleur -->
      <div class="relative">
        <select name="couleur" 
                id="couleur" 
                class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200">
          <option @selected($tag->couleur=='primary') value="primary">Bleu</option>
          <option @selected($tag->couleur=='light') value="light">Blanche</option>
          <option @selected($tag->couleur=='secondary') value="secondary">Gris</option>
          <option @selected($tag->couleur=='success') value="success">Verte</option>
          <option @selected($tag->couleur=='info') value="info">Blue claire</option>
          <option @selected($tag->couleur=='warning') value="warning">Jaune</option>
          <option @selected($tag->couleur=='danger') value="danger">Rouge</option>
          <option @selected($tag->couleur=='dark') value="dark">Noire</option>
        </select>
        <label class="absolute left-4 -top-2.5 bg-gray-800 px-2 text-sm text-gray-400">
          Sélectionner une couleur
        </label>
        @error('couleur')
          <div class="mt-2 text-red-500 text-sm">{{$message}}</div>
        @enderror
      </div>

      <!-- Switch Status -->
      <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" 
               name="status" 
               value="1" 
               class="sr-only peer" 
               {{$tag->status == 1 ? "checked" : ""}}>
        <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
        <span class="ml-3 text-sm text-gray-400">Masqué</span>
      </label>
      @error('status')
        <div class="text-red-500 text-sm">{{$message}}</div>
      @enderror

      <!-- Bouton Submit -->
      <button type="submit" 
              class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
        {{ $tag->exists ? 'Modifier' : 'Ajouter' }}
      </button>
    </form>
  </div>
</div>

@endsection