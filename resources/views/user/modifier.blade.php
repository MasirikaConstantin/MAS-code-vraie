@extends('base')
@section('contenus')

<main class="flex-1 mt-20 bg-gray-900 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="border-b border-violet-600/30 pb-4 mb-8">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-violet-200 to-pink-200">
                Poser une Question
            </h1>
        </div>

        <form method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Switch -->
            <div class="flex items-center space-x-3">
                <label class="text-violet-200" for="flexSwitchCheckChecked">Désactiver</label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="etat" value="1" class="sr-only peer" {{$post->etat == 1 ? "checked" : ""}}
                           id="flexSwitchCheckChecked">
                    <div class="w-11 h-6 bg-gray-700 peer-focus:ring-4 peer-focus:ring-violet-500/50 rounded-full peer 
                               peer-checked:after:translate-x-full peer-checked:bg-violet-600 after:content-[''] after:absolute 
                               after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 
                               after:transition-all"></div>
                </label>
            </div>
            @error("etat")
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
            @enderror

            <!-- Title Input -->
            <div class="relative">
                <input type="text" name="titre" value="{{old('titre', $post->titre)}}" 
                       class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg 
                              focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white placeholder-gray-400"
                       placeholder="Titre *">
            </div>
            @error("titre")
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
            @enderror

            <input type="text" value="{{Auth::user()->id}}" name="user_id" hidden>

            <!-- Category Select -->
            <select name="categorie_id" required
                    class="w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg text-white
                           focus:ring-2 focus:ring-violet-500 focus:border-transparent">
                <option selected value="">Sélectionner la catégorie</option>
                @foreach ($categories as $l)
                    <option @selected(old('categorie_id', $post->categorie_id)== $l->id) value="{{$l->id}}">
                        {{$l->titre}}
                    </option>
                @endforeach
            </select>
            @error("categorie_id")
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
            @enderror

            <!-- Tags Select -->
            @php
                $tagsId=($post->tags()->pluck('id'));
            @endphp
            <select name="tags[]" multiple
                    class="w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg text-white
                           focus:ring-2 focus:ring-violet-500 focus:border-transparent">
                @foreach ($tags as $ll)
                    <option @selected($tagsId->contains($ll->id)) value="{{$ll->id}}">{{$ll->nom}}</option>
                @endforeach
            </select>
            @error("tags")
                <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
            @enderror

            <!-- Image Upload -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-violet-200">Photo (si possible)</label>
                    <input type="file" name="image" id="fileUpload"
                           class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0 file:text-sm file:font-semibold
                                  file:bg-violet-600 file:text-white hover:file:bg-violet-700
                                  cursor-pointer border rounded-lg">
                </div>
                <div class="relative h-48 bg-gray-800/50 rounded-lg overflow-hidden">
                    <img id="imageDiv" src="@if($post->image){{$post->imageUrl()}}@endif" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Content Textareas -->
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-violet-200">Votre Message</label>
                    <textarea name="contenus" rows="10"
                              class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg
                                     focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white">{{old('contenus', $post->contenus)}}</textarea>
                    @error("post")
                        <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-violet-200">Code Source</label>
                    <textarea name="codesource" rows="10"
                              class="block w-full px-4 py-3 bg-gray-800/50 border border-violet-500/30 rounded-lg
                                     focus:ring-2 focus:ring-violet-500 focus:border-transparent text-white">{{$post->codesource}}</textarea>
                    @error("codesource")
                        <div class="bg-red-900/50 text-red-200 p-3 rounded-lg">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 
                           hover:to-purple-700 text-white font-medium rounded-lg transform hover:scale-105 
                           transition-all duration-300 shadow-lg hover:shadow-violet-500/50">
                Publier
            </button>
        </form>
    </div>

    <script>
        new TomSelect('select[multiple]',{plugins:{remove_button: {title: 'Delacher'}}})
    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

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