@extends('base')
@section('contenus')
@section('titre', 'Nouveau')

<main class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600 mb-8">
            Poser une Question
        </h1>

        <form method="post" enctype="multipart/form-data" class="space-y-8 bg-gray-800/50 backdrop-blur-lg rounded-2xl p-8 shadow-xl">
            @csrf
                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden >
                @error("user_id")
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            <!-- Titre -->
            <div class="relative">
                <input type="text" name="titre" value="{{ old('titre') }}" 
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-100 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" id="titre">
                <label for="titre" 
                    class="absolute text-sm text-gray-200 dark:text-gray-400 duration-300 transform -translate-y-4 bg-gray-800 scale-75 top-2 z-10 origin-[0]  dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                    Titre *
                </label>
                @error("titre")
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Catégorie -->
            <div class="relative">
                <select name="categorie_id" 
                    class="w-full bg-gray-700 border-0 rounded-lg text-white py-3 px-4 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <option value="">Sélectionner la catégorie</option>
                    @foreach ($categories as $l)
                        <option value="{{ $l->id }}" {{ old('categorie_id') == $l->id ? 'selected' : '' }}>
                            {{ $l->titre }}
                        </option>
                    @endforeach
                </select>
                @error("categorie_id")
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tags -->
            <div class="relative">
                <select name="tags[]" multiple 
                    class="w-full bg-gray-700 border-0 rounded-lg text-white py-3 px-4 focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    @foreach ($tags as $ll)
                        <option class="bg-gray-700" value="{{ $ll->id }}">{{ $ll->nom }}</option>
                    @endforeach
                </select>
                @error("tags")
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Image -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-400">
                        Photo (optionnelle)
                    </label>
                    <div class="relative">
                        <input type="file" name="image" id="fileUpload"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            accept="image/*">
                        <div class="bg-gray-700 rounded-lg p-4 text-center border-2 border-dashed border-gray-600 hover:border-purple-500 transition-colors">
                            <span class="text-gray-400">Glissez une image ou cliquez pour sélectionner</span>
                        </div>
                    </div>
                </div>
                <div class="h-48 bg-gray-700 rounded-lg overflow-hidden">
                    <img id="imageDiv" class="w-full h-full object-cover" />
                </div>
                @error("image")
                    <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Message et Code Source -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-400">
                        Votre Message
                    </label>
                    <textarea name="contenus" rows="10" 
                        class="w-full bg-gray-700 border-0 rounded-lg text-white py-3 px-4 focus:ring-2 focus:ring-purple-500 focus:outline-none">{{ trim(old('contenus')) }}</textarea>
                    @error("contenus")
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-400">
                        Code Source (optionnel)
                    </label>
                    <textarea name="codesource" rows="10" 
                        class="w-full bg-gray-700 border-0 rounded-lg text-white font-mono py-3 px-4 focus:ring-2 focus:ring-purple-500 focus:outline-none">{{ trim(old('codesource')) }}</textarea>
                    @error("codesource")
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full md:w-auto px-8 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-medium rounded-lg hover:from-purple-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900 transition-all">
                Publier
            </button>
        </form>
    </div>

    <script>
        document.getElementById('fileUpload').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imageDiv').src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>

</main>
@endsection