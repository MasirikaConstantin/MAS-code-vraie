@extends('admin.base')
@section('section',$category->exists ? 'Editer une Categorie' :'Créer une Categorie')
@section('titre', $category->exists ? 'Editer une Categorie' :'Créer une Categorie')
@section('contenus')

<div class="min-h-screen bg-gray-900 py-8">
  <div class="max-w-4xl mx-auto px-4">
    <form action="{{route($category->exists ? 'admin.editcat': 'admin.newcat', $category)}}" method="post" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-8 rounded-2xl shadow-xl backdrop-blur-lg border border-gray-700">
      @csrf
      
      <div class="relative">
        <input type="text" name="titre" id="titre" value="{{old('titre',$category->titre)}}" class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200 peer placeholder-transparent">
        <label for="titre" class="absolute left-4 -top-2.5 bg-gray-800 px-2 text-sm text-gray-400 transition-all peer-placeholder-shown:top-3 peer-focus:-top-2.5">Titre</label>
        @error('titre')
          <div class="mt-2 text-red-500 text-sm">{{$message}}</div>
        @enderror
      </div>

      <div class="relative">
        <select name="couleur" id="couleur" class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200">
          <option @selected(old('couleur', $category->couleur)) value="primary">Bleu</option>
          <option @selected(old('couleur', $category->couleur)) value="light">Blanche</option>
          <option @selected(old('couleur', $category->couleur)) value="secondary">Gris</option>
          <option @selected(old('couleur', $category->couleur)) value="success">Verte</option>
          <option @selected(old('couleur', $category->couleur)) value="info">Blue claire</option>
          <option @selected(old('couleur', $category->couleur)) value="warning">Jaune</option>
          <option @selected(old('couleur', $category->couleur)) value="danger">Rouge</option>
          <option @selected(old('couleur', $category->couleur)) value="dark">Noire</option>
        </select>
        <label class="absolute left-4 -top-2.5 bg-gray-800 px-2 text-sm text-gray-400">Sélectionner une couleur</label>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <div class="space-y-2">
          <label class="block text-sm text-gray-400">Photo (si possible)</label>
          <input type="file" name="image" id="fileUpload" class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-2 text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600">
        </div>
        <div class="h-48 bg-gray-700 rounded-lg overflow-hidden">
          <img id="imageDiv" class="w-full h-full object-cover"/>
        </div>
      </div>

      <div>
        <label class="block text-sm text-gray-400 mb-2">Code SVG (si possible)</label>
        <input type="text" name="svg" {{old('svg',$category->svg)}} class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200">
      </div>

      <div class="relative">
        <textarea name="description" id="description" rows="4" class="w-full bg-gray-700 border-2 border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition duration-200">{{old('description',$category->description)}}</textarea>
        <label class="absolute left-4 -top-2.5 bg-gray-800 px-2 text-sm text-gray-400">Description</label>
      </div>

      <label class="relative inline-flex items-center cursor-pointer">
        <input type="checkbox" name="status" value="1" class="sr-only peer" {{$category->status == 1 ? "checked" : ""}}>
        <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
        <span class="ml-3 text-sm text-gray-400">Masqué</span>
      </label>

      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
        {{ $category->exists ? 'Modifier' : 'Ajouter' }}
      </button>
    </form>
  </div>
</div>

<script>
document.getElementById('fileUpload').addEventListener('change', function() {
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('imageDiv').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
});
</script>

@endsection