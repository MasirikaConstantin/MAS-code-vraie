@extends('base')
@section('titre', $astuce->exists ? 'Editer une Astuce' : 'Créer une Astuce')
@section('section', $astuce->exists ? 'Editer une Astuce' : 'Créer une Astuce')

@section('contenus')
<section class="py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('index') }}" class="text-gray-400 hover:text-blue-600">Accueil</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('dashboard') }}" class="text-gray-200 hover:text-blue-600">Profil</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-blue-600 border border-blue-600 px-3 py-1 rounded-md">Publier une astuce</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-gray-800 rounded-lg shadow-sm">
        <div class="p-6">
            <form action="{{ route($astuce->exists ? 'astuces.editastuce' : 'astuces.new', $astuce) }}" 
                  method="POST" 
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf
				<input hidden type="number" value="{{Auth::user()->id}}" name="user_id"  >
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <div class="md:col-span-2">
                        <label for="titre" 
						@error('titre')
							class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
						@enderror
						class="block text-sm font-medium text-gray-200">Titre</label>
                        <input type="text" 
                               name="titre" 
                               id="titre"
                               value="{{ old('titre', $astuce->titre) }}"
							   @error('titre')
								  class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500" 
							   @enderror
                               class="mt-1 bg-gray-700 block w-full text-gray-100 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Le titre de l'astuce">
                        @error('titre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="categorie_id" 
						@error('categorie_id')
							class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
						@enderror
						class="block text-sm font-medium text-gray-200">Catégorie</label>
                        <select id="categorie_id" 
                                name="categorie_id"
								@error('categorie_id')
									class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
								@enderror
                                class="mt-1 block w-full bg-gray-700 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($astuce->exists)
                                        {{ $category->id == $astuce->category->id ? 'selected' : '' }}
                                    @else
                                        {{ old('categorie_id') == $category->id ? 'selected' : '' }}
                                    @endif>
                                    {{ $category->titre }}
                                </option>
                            @endforeach
                        </select>
                        @error('categorie_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" 
					@error('description')
							class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
						@enderror
					class="block text-sm font-medium text-gray-200">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="5"
							  @error('description')
								  class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
							  @enderror
                              class="mt-1 block w-full bg-gray-700 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                              placeholder="Ajoutez une description pour faciliter la recherche">{{ old('description', $astuce->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label
					@error('tags')
							class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
						@enderror
						 class="block text-sm font-medium text-gray-200 mb-2">Tags (maximum 4)</label>
                    <div class="flex  flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <label id="{{ $tag->id }}" class="inline-flex items-center bg-gray-900 rounded-md px-3 py-2">
                                <input type="checkbox"
                                       name="tags[]"
									   id="{{ $tag->id }}"
                                       value="{{ $tag->id }}"
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                       @if($astuce->exists && $astuce->tags->contains($tag->id)) checked @endif
                                       @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif>
                                <span class="ml-2">{{ $tag->nom }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('tags')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contenus" 
					@error('contenus')
							class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
						@enderror
						class="block text-sm font-medium text-gray-200">
                        Contenus <span class="text-red-500">*</span>
                    </label>
                    <textarea id="tiny"
                              name="contenus"
                              rows="15"
							  @error('contenus')
								  class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
							  @enderror
                              class="mt-1 block w-full bg-gray-700 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('contenus', $astuce->contenus) }}</textarea>
                    @error('contenus')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-200">Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="fileUpload" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500">
                                        <span>Téléverser un fichier</span>
                                        <input id="fileUpload" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="imagePreview" class="mt-2">
                        @if($astuce->image)
                            <img src="{{ $astuce->imageUrlAstuce() }}" 
                                 class="max-h-48 rounded-lg object-cover"
                                 alt="Preview"
								 id='imageDiv'>
                        @endif
                    </div>
					@if($astuce->exists )
					
					@else
					<div class="col-md-6 img-c" >
						<img id='imageDiv' class="h-s100" style="width: 320px; height: 200px;"  />
					</div>
					@endif
                </div>

                <div>
                    <label for="video" class="block text-sm font-medium text-gray-200">Lien vidéo (facultatif)</label>
                    <input type="url"
                           id="video"
                           name="video"
                           value="{{ old('video', $astuce->video) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="https://www.youtube.com/watch?v=...">
                    @error('video')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ $astuce->exists ? 'Mettre à jour' : 'Publier' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>


    // Limitation du nombre de tags
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="tags[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedBoxes = document.querySelectorAll('input[type="checkbox"][name="tags[]"]:checked');
            if (checkedBoxes.length > 4) {
                this.checked = false;
                alert('Vous ne pouvez sélectionner que 4 tags maximum');
            }
        });
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
	<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			var img = document.createElement('img');
			img.src = e.target.result;
			document.getElementById('imageDiv').appendChild(img);
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>
@endpush

@endsection