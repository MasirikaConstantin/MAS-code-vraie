<section class="not-format mt-6">
@php
     $class=null;
                      if($astuce->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($astuce->categorie_id==33){
                                $class='language-css';
                            }
                            elseif($astuce->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($astuce->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($astuce->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($astuce->categorie_id==6){
                                $class='language-java';
                            }else{
                              $class='language-html';

                            }

@endphp
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-200 dark:text-white">Discussion</h2>
    </div>

    <!-- Formulaire de commentaire -->
    <form wire:submit.prevent="commenter" class="mb-6">
        @auth
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" name="astuce_id" value="{{ $astuce_id }}">
        @endauth

        <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Votre commentaire</label>
            <textarea wire:model="contenus" rows="3" class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Écrivez un commentaire... (*)" required></textarea>
        </div>
        @error('contenus')
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Erreur !</span> {{ $message }}
                </div>
            </div>
        @enderror

        <div class="py-2 px-4 mb-4 bg-gray-400 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="codesource" class="sr-only">Code source</label>
            <textarea wire:model="codesource" rows="3" class="px-0 w-full bg-gray-400 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Code Source (Facultatif)"></textarea>
        </div>
        @error('codesource')
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Erreur !</span> {{ $message }}
                </div>
            </div>
        @enderror

        @auth
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Commenter
            </button>
        @endauth
        @guest
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                <a href="{{ route('login') }}">Se connecter avant de commenter cette astuce</a>
            </div>
        @endguest
    </form>

    <!-- Liste des commentaires -->
    @foreach ($commentaires as $comm)
        <article class="p-6 mb-6 text-base bg-gray-800 rounded-lg ">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-200 dark:text-white">
                        @if ($comm->user->image)
                            <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comm->user->imageUrls() }}" alt="{{ $comm->user->name }}">
                        @else
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loop->index }}">
                                <a id="exemple">
                                    <i class="bi bi-person-circle s"></i>
                                </a>
                            </button>
                        @endif
                        {{ $comm->user->name }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <time pubdate datetime="{{ $comm->created_at->toIso8601String() }}" title="{{ $comm->created_at->format('d F Y') }}">
                            {{ $comm->created_at->diffForHumans() }}
                        </time>
                    </p>
                </div>
                @auth
                    @if ($comm->user->id == auth()->id())
                        <!-- Bouton pour ouvrir le menu déroulant -->
                        <button id="dropdownComment{{ $loop->index }}Button" data-dropdown-toggle="dropdownComment{{ $loop->index }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-gray-800 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-750 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Paramètres du commentaire</span>
                        </button>
                        <!-- Menu déroulant -->
                        <div id="dropdownComment{{ $loop->index }}" class="hidden z-10 w-36 bg-gray-800 rounded divide-y divide-gray-800 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-100 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="{{ route('edit.comm', ['comment' => $comm->id]) }}" class="block py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                </li>
                                <li>
                                    <button wire:click="delete({{ $comm->id }})" class="block w-full text-left py-2 px-4 hover:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white">Supprimer</button>
                                </li>
                            </ul>
                        </div>
                    @endif
                @endauth
            </footer>
            <p>
                {{ $comm->contenus }}
                @if ($comm->codesource)
                    <pre class="border border-5 mt-5"><code class="{{ $class }}">{{ $comm->codesource }}</code></pre>
                @endif
            </p>
        </article>
    @endforeach

    <!-- Pagination des commentaires -->
    <div class="mb-6">
        {{ $commentaires->links() }}
    </div>
</section>