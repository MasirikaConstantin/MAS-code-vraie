<div>
    
@php
use Illuminate\Support\Str;
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
@endphp

<!-- Formulaire de recherche -->
<div class="container mx-auto px-4 my-8">
    <form action="" method="get">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <!-- Titre -->
            <div class="relative group">
                <input type="text" 
                wire:model.live="search"
                       class="w-full h-12 bg-gray-800/50 rounded-lg border border-gray-700 text-white pl-4 pr-10 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/30 transition-all"
                       placeholder="Entrer un mot clé">
            </div>

           

            
        </div>
    </form>

    <hr class="my-6">

    <!-- Liste des posts -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($posts as $post)
        @php
            $titre = str_replace(' ','-',$post->slug)
        @endphp
        <div class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl  shadow-sm overflow-hidden border border-gray-900">
            <div class="flex">
                <div class="flex-1 p-6">
                    <div class="text-indigo-600 font-semibold">{{Str::limit($post->titre,80)}}</div>
                    <h3 class="mt-2 flex items-center text-gray-400">
                        <i class="bi bi-folder2-open mr-2"></i>{{$post->category->titre}}
                    </h3>
                    <div class="text-sm text-gray-300 mt-2">
                        {{$post->created_at->formatLocalized(' %d %B %Y')}}
                        <p class="mt-1">Par : {{$post->user->name}}</p>
                    </div>
                    <p class="mt-4 text-gray-100">{{Str::limit(strip_tags($post->contenus,200))}}</p>
                    <a href="{{route('user.show',['nom'=>Str::lower($titre)])}}" 
                        class="mt-4 inline-block text-indigo-600 hover:text-indigo-700">
                        Lire la suite →
                    </a>
                </div>
                <div class="w-48 hidden lg:block">
                    @if($post->image)
                    <img class="h-full w-full object-cover" src="{{$post->imageUrl()}}" alt="{{$post->titre}}">
                    @else
                    <div class="h-full w-full p-4">
                        {!! $post->category->svg !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-2 bg-red-100 text-red-700 p-4 rounded-lg">
            Aucune publication ne correspond à votre recherche
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{$posts->links()}}
    </div>

    <hr class="my-6">

    <!-- Catégories -->
    <h3 class="text-2xl font-bold mb-6">Nos Catégories</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($categories as $category)
        <div class="relative  bg-gradient-to-r from-slate-900 to-slate-800 rounded-xl flex rounded-lg border border-5 border-{{$category->couleur}} overflow-hidden">
            <div class="w-1/4 p-4">
                @if ($category->image)
                <div class="w-full h-full">
                    <img src="{{ $category->imageUrlcat() }}" alt="">
                </div>
                @else
                <div class="w-full h-full">
                    {!! $category->svg !!}
                </div>
                @endif
            </div>
            <div class="flex-1 p-4">
                <h5 class="font-bold text-gray-100">{{$category->titre}}</h5>
                <p class="mt-2 text-gray-200">{{Str::limit($category->description,180)}} </p>
               
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
.svg-container svg {
    width: 100%;
    height: 100%;
}
</style>

</div>
