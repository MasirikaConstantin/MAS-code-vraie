<section class="not-format mt-6">
    @php
        
        $class=null;
                      if($post->categorie_id==1){
                                $class='language-csv';
                            }
                            elseif($post->categorie_id==33){
                                $class='language-css';
                            }
                            elseif($post->categorie_id==3){
                                $class='language-php' ;
                            }
                            elseif($post->categorie_id==4){
                                $class='language-javascript';
                            }
                            elseif($post->categorie_id==5){
                                $class='language-python';
                            }
                            elseif($post->categorie_id==6){
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
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        @endauth

        <div class="py-2 px-4 mb-4 bg-gray-200 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Votre commentaire</label>
            <textarea wire:model="contenus" rows="6" class="px-0 w-full bg-gray-200 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Écrivez un commentaire... (*)" required></textarea>
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

        <div class="py-2 px-4 mb-4 bg-gray-200 rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="codesource" class="sr-only">Code source</label>
            <textarea wire:model="codesource" rows="4" class="px-0 w-full bg-gray-200 text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Code Source (Facultatif)"></textarea>
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
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                Commenter
            </button>
        @endauth
        @guest
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-3">
                <a href="{{ route('login') }}">Se connecter avant de commenter ce post</a>
            </div>
        @endguest
    </form>

    <!-- Liste des commentaires -->
    @foreach ($commentaires as $comm)
        @php
            $k = $loop->index;
            $count1 = $k . "aa2";
        @endphp
        <article class="p-6 mb-6 text-base bg-gray-800 rounded-lg ">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    @if ($comm->user->image)
                        <button type="button" class="focus:outline-none" data-modal-target="userModal{{ $count1 }}" data-modal-toggle="userModal{{ $count1 }}">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-300 dark:text-white">
                                <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comm->user->imageUrls() }}" alt="{{ $comm->user->name }}">
                                {{ $comm->user->name }}
                            </p>
                        </button>
                    @else
                        <button type="button" class="focus:outline-none" data-modal-target="userModal{{ $count1 }}" data-modal-toggle="userModal{{ $count1 }}">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-300 dark:text-white">
                                <svg class="mr-2 w-8 h-8 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                {{ $comm->user->name }}
                            </p>
                        </button>
                    @endif
                    <p class="text-sm text-gray-400 dark:text-gray-400">
                        <time pubdate datetime="{{ $comm->created_at->toIso8601String() }}" title="{{ $comm->created_at->format('d F Y') }}">
                            {{ $comm->created_at->diffForHumans() }}
                        </time>
                    </p>
                </div>
                @auth
                    @if ($comm->user->id == auth()->id())
                        <button id="dropdownComment{{ $k }}Button" data-dropdown-toggle="dropdownComment{{ $k }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-gray-800 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-750 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                            </svg>
                            <span class="sr-only">Paramètres du commentaire</span>
                        </button>
                        <!-- Menu déroulant -->
                        <div id="dropdownComment{{ $k }}" class="hidden z-10 w-36 bg-gray-800 rounded divide-y divide-gray-800 shadow dark:bg-gray-700 dark:divide-gray-600">
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
            <p class="text-gray-200 ">
                {{ $comm->contenus }}
                @if ($comm->codesource)
                    <pre class="border border-5 mt-5"><code class="{{ $class }}">{!! $comm->codesource !!}</code></pre>
                @endif
            </p>
        </article>

        <!-- Modal pour le profil utilisateur -->
        <div id="userModal{{ $count1 }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center backdrop-blur-xl">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal Container -->
                <div class="relative bg-gradient-to-br from-violet-950/90 to-indigo-950/90 rounded-2xl shadow-2xl border border-violet-500/20">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b border-violet-600/30 bg-violet-900/30 backdrop-blur-sm">
                        <h3 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                            Profil utilisateur
                        </h3>
                        <button type="button" class="text-violet-300 hover:text-white bg-violet-800/30 hover:bg-violet-700/50 rounded-lg p-2 transition-all duration-300 transform hover:scale-105" data-modal-toggle="userModal{{ $count1 }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="p-6 space-y-6 bg-gradient-to-br from-violet-900/50 to-indigo-900/50 rounded-b-2xl backdrop-blur-md">
                        <div class="backdrop-filter backdrop-blur-sm bg-white/5 rounded-xl p-6 border border-violet-500/20 shadow-lg">
                            <div class="flex items-center space-x-6">
                                <!-- Image Section -->
                                <div class="flex-shrink-0 relative group">
                                    @if($comm->user->image)
                                        <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300" src="{{ $comm->user->imageUrls() }}" alt="{{ $comm->user->name }}" />
                                    @else
                                        <img class="h-24 w-24 rounded-full object-cover ring-4 ring-violet-400/50 shadow-lg transform group-hover:scale-105 transition-all duration-300" src="{{ asset('téléchargement.png') }}" alt="Default profile" />
                                    @endif
                                    <div class="absolute inset-0 rounded-full bg-violet-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                <!-- User Info Section -->
                                <div class="flex-1 space-y-4">
                                    <h3 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-violet-200 to-pink-200">
                                        {{ $comm->user->name }}
                                    </h3>
                                    <p class="text-violet-200 font-medium">
                                        Membre depuis
                                        <span class="text-pink-200 font-semibold">
                                            {{ $comm->user->created_at->diffForHumans() }}
                                        </span>
                                    </p>
                                    <p class="text-violet-300/90">
                                        <span class="text-sm flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                            </svg>
                                            {{ $comm->user->subscribers()->count() }} abonnés
                                        </span>
                                    </p>
                                    <a href="{{ route('user.profil', ['user' => $comm->user, 'nom' => Str::slug($comm->user->name, '-')]) }}" class="inline-block px-6 py-2.5 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white font-medium rounded-full transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-violet-500/50">
                                        Voir le profil
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Pagination des commentaires -->
    <div class="mb-6">
        {{ $commentaires->links() }}
    </div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</section>