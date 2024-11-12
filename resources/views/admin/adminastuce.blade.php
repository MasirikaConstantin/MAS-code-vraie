@extends('admin.base')
@section('section','Admin Astuce')
@section('titre', 'Admin Astuce')
@section('contenus')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h2 class="text-2xl font-bold text-gray-100 mb-8 bg-gradient-to-r from-blue-500 to-violet-500 bg-clip-text text-transparent">
        Les plus récents
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($astuces as $astuce)
            <div class="transform transition duration-500 hover:scale-105">
                <div class="bg-gray-900 border border-gray-800 rounded-xl shadow-lg overflow-hidden backdrop-blur-lg bg-opacity-80">
                    <div class="px-6 py-4 border-b border-gray-800 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-100">{{$astuce->titre}}</h3>
                        <span class="px-3 py-1 text-xs rounded-full {{ $astuce->etat == 1 
                            ? 'bg-green-500/10 text-green-400 border border-green-500/20' 
                            : 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20' }}">
                            {{$astuce->etat == 1 ? 'Posté' : 'En attente'}}
                        </span>
                    </div>

                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-blue-400">{{$astuce->users->name}}</div>
                        <p class="text-gray-400 text-base"> {{Str::limit($astuce->description,90)}}</p>
                    </div>

                    <div class="px-6 py-4">
                        <a href="{{route('admin.gerer',['id'=>$astuce])}}" 
                           class="w-full block text-center px-4 py-2 bg-gradient-to-r from-blue-500 to-violet-500 text-white font-semibold rounded-lg
                                  hover:from-blue-600 hover:to-violet-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
                                  transform transition-all duration-300 hover:-translate-y-0.5">
                            Administrer
                        </a>
                    </div>

                    <div class="px-6 py-4 bg-gray-800/50 text-gray-400 text-sm">
                        {{ $astuce->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3">
                <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-lg text-center">
                    Aucune astuce en attente
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        <div class="bg-gray-900 rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                {{$astuces->links()}}
            </div>
        </div>
    </div>

    <hr class="my-8 border-gray-800">
</div>

@endsection