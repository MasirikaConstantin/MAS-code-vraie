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




  <!-- Section Formations -->
<section class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <!-- En-tête de section -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500 mb-4">
                Formez-vous aux Technologies de Demain
            </h2>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                Développez vos compétences avec nos formations en ligne certifiantes. 
                Explorez des domaines innovants et restez à la pointe de la technologie.
            </p>
        </div>
  
        <!-- Grille des formations -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Carte Formation Web -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Développement Web</h3>
                <p class="text-gray-400 mb-4">Frontend, Backend, Full-Stack</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">HTML/CSS</span>
                    <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">JavaScript</span>
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">PHP</span>
                </div>
            </div>
  
            <!-- Carte Formation Mobile -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Développement Mobile</h3>
                <p class="text-gray-400 mb-4">iOS, Android, Cross-platform</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Flutter</span>
                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">React Native</span>
                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Swift</span>
                </div>
            </div>
  
            <!-- Carte IA & Machine Learning -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">IA & Machine Learning</h3>
                <p class="text-gray-400 mb-4">Deep Learning, Data Science</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Python</span>
                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">TensorFlow</span>
                    <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">PyTorch</span>
                </div>
            </div>
  
            <!-- Carte Cybersécurité -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Cybersécurité</h3>
                <p class="text-gray-400 mb-4">Sécurité Web, Ethical Hacking</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-sm">Pentesting</span>
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Cryptographie</span>
                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Forensics</span>
                </div>
            </div>
  
            <!-- Carte Cloud Computing -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Cloud Computing</h3>
                <p class="text-gray-400 mb-4">AWS, Azure, Google Cloud</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full text-sm">AWS</span>
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Docker</span>
                    <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-sm">Kubernetes</span>
                </div>
            </div>
  
            <!-- Carte Blockchain -->
            <div class="bg-gray-800 rounded-xl p-6 hover:transform hover:scale-105 transition-all duration-300 border border-cyan-500/30">
                <div class="mb-4">
                    <svg class="w-12 h-12 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Blockchain</h3>
                <p class="text-gray-400 mb-4">Web3, Smart Contracts</p>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-sm">Ethereum</span>
                    <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-sm">Solidity</span>
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-sm">Web3.js</span>
                </div>
            </div>
        </div>
  
       
    </div>
  </section>
    
    </div>

@endsection