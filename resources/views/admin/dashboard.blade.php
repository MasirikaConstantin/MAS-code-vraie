@extends('admin.base')
@section('section', 'Admin site')
@section('titre', 'AdminBase')
@section('contenus')

@php
    $count1 = 0;
    $count = "0";
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME, 'fr_FR.utf8');
    \Carbon\Carbon::setLocale('fr');
@endphp

@if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 relative">
        {{ session('success') }}
        <button class="absolute top-0 right-0 mt-4 mr-4" onclick="this.parentElement.remove()">
            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
@endif

<div class="container mx-auto px-4">
    <!-- Section Statistiques -->
    <div class="mb-8">
        <div class="bg-gray-800 rounded-lg shadow-md p-6 w-64">
            <h5 class="text-lg font-semibold mb-4">Nombre de posts</h5>
            <div class="text-4xl font-bold text-blue-600">
                <span class="purecounter" data-purecounter-start="0" data-purecounter-end="{{ $posts->count() }}" data-purecounter-duration="1"></span>
            </div>
        </div>
    </div>

    <!-- Section Catégories -->
    <div class="bg-gray-800 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-xl font-semibold">Catégories</h3>
            <div class="space-x-4">
                <a href="{{ route('admin.adminastuce') }}" class="text-blue-600 hover:text-blue-800">Les astuces</a>
                <a href="{{ route('admin.newcat') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Créer une catégorie
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="flex flex-wrap gap-2">
                @foreach ($category as $cat)
                    @php $count1 = $count++ . "A"; @endphp
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-700" 
                            onclick="document.getElementById('modal{{ $count1 }}').classList.remove('hidden')">
                        {{ $cat->titre }}
                    </button>

                    <!-- Modal Catégorie -->
                    <div id="modal{{ $count1 }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-gray-800 rounded-lg w-full max-w-md mx-4">
                            <div class="flex justify-between items-center p-6 border-b">
                                <h5 class="text-xl font-semibold">{{ $cat->titre }}</h5>
                                <button onclick="this.closest('[id^=modal]').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <p><span class="font-semibold">Description:</span> {{ $cat->description }}</p>
                                    <p><span class="font-semibold">Date de publication:</span> {{ $cat->created_at->formatLocalized(' %d %B %Y') }}</p>
                                    @if($cat->created_at != $cat->updated_at)
                                        <p><span class="font-semibold">Modifié le:</span> {{ $cat->updated_at->formatLocalized(' %d %B %Y') }}</p>
                                    @endif
                                    
                                    @if ($cat->image)
                                        <div class="flex justify-center">
                                            <img class="h-32 w-32 rounded-full object-cover" src="{{ $cat->imageUrlcat() }}" alt="{{ $cat->titre }}">
                                        </div>
                                    @endif
                                    
                                    <div class="flex justify-end space-x-4">
                                        <a href="{{ route('admin.editcat', ['id' => $cat->id]) }}" 
                                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Éditer</a>
                                        <a href="{{ route('admin.deletecat', ['id' => $cat->id]) }}" 
                                           class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Section Tags -->
    <div class="bg-gray-800 rounded-lg shadow-md mb-8">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-xl font-semibold">Tags</h3>
            <a href="{{ route('admin.newtag') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Créer un Tag
            </a>
        </div>
        <div class="p-6">
            <div class="flex flex-wrap gap-2">
                @foreach ($tags as $tag)
                    @php $count++; @endphp
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-700"
                            onclick="document.getElementById('tagModal{{ $count }}{{ $tag->id }}').classList.remove('hidden')">
                        {{ $tag->nom }}
                    </button>

                    <!-- Modal Tag -->
                    <div id="tagModal{{ $count }}{{ $tag->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-gray-800 rounded-lg w-full max-w-md mx-4">
                            <div class="flex justify-between items-center p-6 border-b">
                                <h5 class="text-xl font-semibold">{{ $tag->nom }}</h5>
                                <button onclick="this.closest('[id^=tagModal]').classList.add('hidden')" class="text-gray-500 hover:text-gray-700">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex items-center">
                                    <span class="font-semibold mr-2">Couleur:</span>
                                    <span class="px-2 py-1 rounded text-sm {{ !is_null($tag->couleur) ? 'bg-' . $tag->couleur . '-500 text-white' : 'bg-gray-200' }}">
                                        {{ $tag->nom }}
                                    </span>
                                </div>
                                <p><span class="font-semibold">Date:</span> {{ $tag->created_at->formatLocalized(' %d %B %Y') }}</p>
                                @if($tag->created_at != $tag->updated_at)
                                    <p><span class="font-semibold">Modifié le:</span> {{ $tag->updated_at->formatLocalized(' %d %B %Y') }}</p>
                                @endif
                                <div class="flex justify-end">
                                    <a href="{{ route('admin.edittag', ['id' => $tag->id]) }}" 
                                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Éditer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Section Utilisateurs -->
    <div class="bg-gray-800 rounded-lg shadow-md">
        <div class="p-6 border-b">
            <h3 class="text-xl font-semibold">Les utilisateurs</h3>
        </div>

        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{ route('admin.users') }}">Utilistaeurs</a>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Photo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800 divide-y divide-gray-200">
                    @foreach ($users as $item)
                        <tr class="hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.gestionuser', ['user' => $item]) }}" 
                                   class="text-blue-600 hover:text-blue-800">{{ $item->name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->created_at->diffForHumans() }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($item->image)
                                    <img class="h-6 w-6 rounded-full object-cover" 
                                         src="{{ $item->imageUrls() }}" 
                                         alt="{{ $item->name }}">
                                @else
                                    <img class="h-6 w-6 rounded-full" 
                                         src="{{ asset('téléchargement.png') }}" 
                                         alt="Default">
                                @endif
                            </td>
                            <td>
                                @if($item->id !== auth()->id())
                
                                    <form action="{{ route('admin.user.destroy', $item) }}" method="POST" 
                                    class="inline">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur {{ $item->name }} ?')" 
                                            class="px-4 py-1 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-300 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Supprimer
                                    </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('purecounter_vanilla.js') }}"></script>
<script>
    new PureCounter();
</script>
@endsection