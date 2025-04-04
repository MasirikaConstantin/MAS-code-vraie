@extends('admin.base')
@section('section', 'Profil Utilisateur')
@section('titre', $user->name)
@section('contenus')

<div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- En-tête du profil -->
        <div class="relative bg-gray-800/50 backdrop-blur-lg rounded-2xl p-8 mb-8 border border-gray-700/50 shadow-xl">
            <div class="absolute top-0 right-0 p-4">
                <span class="px-4 py-2 bg-green-500/20 text-green-400 rounded-full text-sm">
                    {{ $user->role === 1 ? 'Utilisateur' : 'Administrateur' }}
                </span>
            </div>
            
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="relative group">
                    @if($user->image)
                        <img src="{{ $user->imageUrls() }}" 
                             alt="{{ $user->name }}" 
                             class="w-40 h-40 rounded-full object-cover border-4 border-blue-500/30 group-hover:border-blue-500 transition-all duration-300">
                    @else
                        <div class="w-40 h-40 rounded-full bg-gray-700 flex items-center justify-center text-4xl text-gray-400">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="absolute -bottom-2 right-0 bg-blue-500 p-2 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>

                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold text-white mb-2">{{ $user->name }}</h1>
                    <p class="text-blue-400 text-lg mb-4">{{ $user->email }}</p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <div class="px-4 py-2 bg-gray-700/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Membre depuis</span>
                            <p class="text-white">{{ $user->created_at->formatLocalized('%d %B %Y') }}</p>
                        </div>
                        <div class="px-4 py-2 bg-gray-700/50 rounded-lg">
                            <span class="text-gray-400 text-sm">Dernière connexion</span>
                            <p class="text-white">{{ $user->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 border border-gray-700/50 hover:border-blue-500/50 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-purple-500/20 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400">Publications</p>
                        <h3 class="text-2xl font-bold text-white">{{ $user->posts->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 border border-gray-700/50 hover:border-blue-500/50 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-green-500/20 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400">Likes reçus</p>
                        <h3 class="text-2xl font-bold text-white">{{ $user->reactions->count() }}</h3>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 border border-gray-700/50 hover:border-blue-500/50 transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-yellow-500/20 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400">Commentaires</p>
                        <h3 class="text-2xl font-bold text-white">{{ $user->com->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dernières activités -->
        <div class="bg-gray-800/50 backdrop-blur-lg rounded-xl p-6 border border-gray-700/50">
            <h2 class="text-2xl font-bold text-white mb-6">Dernières activités</h2>
            <div class="space-y-6">
                @foreach($posts as $post)
                    <div class="flex items-start gap-4 p-4 bg-gray-700/30 rounded-lg hover:bg-gray-700/50 transition-all">
                        <div class="min-w-[4rem]">
                            @if($post->image)
                                <img src="{{ $post->imageUrl() }}" alt="{{ $post->titre }}" class="w-16 h-16 rounded-lg object-cover">
                            @else
                                <div class="w-16 h-16 bg-gray-600 rounded-lg flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-white">{{ $post->titre }}</h3>
                            <p class="text-gray-400 text-sm mb-2">{{ Str::limit($post->description, 100) }}</p>
                            <div class="flex gap-4 text-sm">
                                <span class="text-blue-400">{{ $post->created_at->diffForHumans() }}</span>
                                <span class="text-gray-500">|</span>
                                <span class="text-purple-400">{{ $post->category->titre }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4" >
                    {{ $posts->links() }}
            </div>
        </div>

        <!-- Actions administrateur -->
        <div class="mt-8 flex gap-4 justify-end">
            <a href="{{ route('admin.edituser', ['user' => $user->id]) }}" 
               class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-300 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Modifier
            </a>
            
            @if($user->id !== auth()->id())
                
                <form action="{{ route('admin.user.destroy', $user) }}" method="POST" 
                class="inline">
                    @csrf
                    @method('DELETE')
                  
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur {{ $user->name }} ?')" 
                        class="px-6 py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Supprimer
                </button>
                </form>
            @endif
        </div>
    </div>
</div>

@endsection