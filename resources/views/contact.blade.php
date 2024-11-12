@extends('base')
@section('section',"Prendre Contact")
@section('titre',"Nous Contacter")
@section('contenus')


    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="container mx-auto px-4 py-12">
        <!-- Section Formations -->
        

        <!-- Formulaire de Contact -->
        <div class="max-w-2xl mx-auto glass-effect rounded-xl p-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Contactez-nous</h2>
            <form method="POST"  class="space-y-6" {{ route('contacts') }} >
                @csrf
                <!-- Nom -->

                <div>
                    <label for="name" class="block text-white text-sm font-medium mb-2">Nom</label>
                    <input type="text" id="name"  name="nom"  value="{{ old("nom") }}" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre nom">
                    @error("nom")
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old("email") }}" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="votre@email.com">
                    @error("email")
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-white text-sm font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Votre message">{{ old("message") }}</textarea>
                    @error("message")
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton Envoyer -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    Envoyer
                </button>
            </form>
        </div>


        <div class="mt-16">
            <h2 class="text-4xl font-bold text-white mb-8 text-center">Nos Formations</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Carte Formation Web -->
                <div class="glass-effect rounded-xl p-6 text-white">
                    <h3 class="text-2xl font-bold mb-4">Développement Web</h3>
                    <p class="mb-4">Formation complète en développement web. Apprenez HTML, CSS, JavaScript et les frameworks modernes pour créer des sites web responsifs et dynamiques.</p>
                    <div class="flex items-center text-sm">
                        <span class="bg-blue-500 px-3 py-1 rounded-full">6 mois</span>
                    </div>
                </div>

                <!-- Carte Formation Mobile -->
                <div class="glass-effect rounded-xl p-6 text-white">
                    <h3 class="text-2xl font-bold mb-4">Développement Mobile</h3>
                    <p class="mb-4">Devenez expert en développement d'applications mobiles. Maîtrisez React Native et Flutter pour créer des apps iOS et Android.</p>
                    <div class="flex items-center text-sm">
                        <span class="bg-blue-500 px-3 py-1 rounded-full">4 mois</span>
                    </div>
                </div>

                <!-- Carte Formation IA -->
                <div class="glass-effect rounded-xl p-6 text-white">
                    <h3 class="text-2xl font-bold mb-4">Intelligence Artificielle</h3>
                    <p class="mb-4">Plongez dans le monde de l'IA et du Machine Learning. Découvrez les algorithmes et les outils pour créer des solutions intelligentes.</p>
                    <div class="flex items-center text-sm">
                        <span class="bg-blue-500 px-3 py-1 rounded-full">8 mois</span>
                    </div>
                </div>
            </div>
        </div>

        @include("formatoin")
    </div>

@endsection