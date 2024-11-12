@php
  $route =request()->route()->getName();
@endphp



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
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-start" >
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
            </button>
  
            <!-- Carte Formation Web -->
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
                      <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                          <h3 class="text-xl font-semibold text-cyan-400">
                              Formation Développement Web
                          </h3>
                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                              <span class="sr-only">Fermer</span>
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-4 md:p-5 space-y-6">
                          <div class="text-gray-300 space-y-6">
                              <!-- Introduction accrocheuse -->
                              <div class="bg-gradient-to-r from-blue-500/10 to-purple-500/10 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-2">Devenez un Développeur Web Complet</h4>
                                  <p class="text-gray-300">
                                      Lancez votre carrière dans le développement web avec notre formation complète qui couvre tous les aspects essentiels du développement moderne.
                                  </p>
                              </div>
            
                              <!-- Parcours de formation -->
                              <div>
                                  <h4 class="text-lg font-semibold text-cyan-400 mb-3">Notre Programme Complet</h4>
                                  
                                  <!-- Frontend -->
                                  <div class="mb-4">
                                      <h5 class="text-blue-400 font-medium mb-2">Frontend Development</h5>
                                      <p class="text-gray-400 mb-2">Maîtrisez la création d'interfaces web modernes avec :</p>
                                      <ul class="list-disc pl-5 text-gray-400">
                                          <li>HTML5 & CSS3 - Les fondations de tout site web moderne</li>
                                          <li>JavaScript - Rendez vos sites interactifs et dynamiques</li>
                                          <li>Frameworks modernes et responsive design</li>
                                      </ul>
                                  </div>
            
                                  <!-- Backend -->
                                  <div class="mb-4">
                                      <h5 class="text-purple-400 font-medium mb-2">Backend Development</h5>
                                      <p class="text-gray-400 mb-2">Développez des applications web robustes avec :</p>
                                      <ul class="list-disc pl-5 text-gray-400">
                                          <li>PHP - Le langage serveur le plus utilisé au monde</li>
                                          <li>Bases de données et API REST</li>
                                          <li>Sécurité et performance des applications</li>
                                      </ul>
                                  </div>
                              </div>
            
                              <!-- Avantages -->
                              <div class="bg-gray-700/50 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-3">Pourquoi Choisir Notre Formation ?</h4>
                                  <ul class="space-y-2">
                                      <li class="flex items-center">
                                          <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                          </svg>
                                          <span>Projets pratiques réels</span>
                                      </li>
                                      <li class="flex items-center">
                                          <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                          </svg>
                                          <span>Suivi personnalisé</span>
                                      </li>
                                      <li class="flex items-center">
                                          <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                          </svg>
                                          <span>Certification professionnelle</span>
                                      </li>
                                  </ul>
                              </div>
            
                              
                              <div class="text-center">
                                <button class="relative bg-gradient-to-r from-blue-500 via-green-500 to-red-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                                    Commencer Votre Formation
                                    <!-- Badge "En cours" -->
                                    <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                        En cours
                                    </span>
                                </button>
                                <p class="text-gray-400 mt-2 text-sm">Places limitées - Prochaine session bientôt</p>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            
  
  
  
            <!-- Carte Formation Mobile -->
            <button data-modal-target="default-modal-mobile" data-modal-toggle="default-modal-mobile" type="button" class="text-start">
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
          </button>
  
            <!-- Carte Programmation Mobile -->
  
            <div id="default-modal-mobile" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
                      <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                          <h3 class="text-xl font-semibold text-cyan-400">
                              Formation Développement Mobile
                          </h3>
                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-mobile">
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                              <span class="sr-only">Fermer</span>
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-4 md:p-5 space-y-6">
                          <div class="text-gray-300 space-y-6">
                              <!-- Introduction accrocheuse -->
                              <div class="bg-gradient-to-r from-blue-500/10 to-green-500/10 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-2">Créez des Applications Mobiles Professionnelles</h4>
                                  <p class="text-gray-300">
                                      Plongez dans l'univers du développement mobile et maîtrisez les technologies les plus demandées du marché pour créer des applications iOS et Android performantes.
                                  </p>
                              </div>
            
                              <!-- Technologies principales -->
                              <div class="grid md:grid-cols-3 gap-4">
                                  <!-- Flutter -->
                                  <div class="bg-blue-500/10 p-4 rounded-lg">
                                      <div class="flex items-center mb-2">
                                          <span class="text-blue-400 font-semibold">Flutter</span>
                                      </div>
                                      <p class="text-sm text-gray-400">Framework Google pour des applications multiplateformes élégantes et performantes</p>
                                  </div>
                                  
                                  <!-- React Native -->
                                  <div class="bg-green-500/10 p-4 rounded-lg">
                                      <div class="flex items-center mb-2">
                                          <span class="text-green-400 font-semibold">React Native</span>
                                      </div>
                                      <p class="text-sm text-gray-400">Développez des applications natives avec JavaScript et React</p>
                                  </div>
            
                                  <!-- Swift -->
                                  <div class="bg-red-500/10 p-4 rounded-lg">
                                      <div class="flex items-center mb-2">
                                          <span class="text-red-400 font-semibold">Swift</span>
                                      </div>
                                      <p class="text-sm text-gray-400">Langage officiel Apple pour des applications iOS professionnelles</p>
                                  </div>
                              </div>
            
                              <!-- Programme détaillé -->
                              <div class="space-y-4">
                                  <h4 class="text-lg font-semibold text-cyan-400">Ce Que Vous Apprendrez</h4>
                                  
                                  <div class="grid md:grid-cols-2 gap-4">
                                      <div>
                                          <h5 class="text-white font-medium mb-2">Développement Multiplateforme</h5>
                                          <ul class="space-y-2">
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Architecture des applications mobiles</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Interfaces utilisateur réactives</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Gestion d'état et performance</span>
                                              </li>
                                          </ul>
                                      </div>
            
                                      <div>
                                          <h5 class="text-white font-medium mb-2">Fonctionnalités Avancées</h5>
                                          <ul class="space-y-2">
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Intégration API et bases de données</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Authentification et sécurité</span>
                                              </li>
                                              <li class="flex items-center">
                                                  <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                      <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                                  </svg>
                                                  <span class="text-sm">Publication sur les stores</span>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
            
                              <!-- Points forts -->
                              <div class="bg-gray-700/50 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-3">Les + de la Formation</h4>
                                  <div class="grid md:grid-cols-3 gap-4 text-sm">
                                      <div class="flex items-center space-x-2">
                                          <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                          </svg>
                                          <span>Projets Concrets</span>
                                      </div>
                                      <div class="flex items-center space-x-2">
                                          <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                          </svg>
                                          <span>Code Review</span>
                                      </div>
                                      <div class="flex items-center space-x-2">
                                          <svg class="w-5 h-5 text-cyan-400" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                                          </svg>
                                          <span>Support Continu</span>
                                      </div>
                                  </div>
                              </div>
            
                              <!-- Call to Action -->
                                <div class="text-center">
                                    <button class="relative bg-gradient-to-r from-blue-500 via-green-500 to-red-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                                        Réserver Ma Place
                                        <!-- Badge "En cours" -->
                                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                            En cours
                                        </span>
                                    </button>
                                    <p class="text-gray-400 mt-2 text-sm">Formation en petit groupe - 18 personnes max.</p>
                                </div>

                          </div>
                      </div>
                  </div>
              </div>
            </div>
  
  
  
            <!-- Carte IA & Machine Learning -->
            <button data-modal-target="default-modal-ia" data-modal-toggle="default-modal-ia" type="button" class="text-start">
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
            </button>
  
  
            <div id="default-modal-ia" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
                      <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                          <h3 class="text-xl font-semibold text-cyan-400">
                              Formation Intelligence Artificielle & Machine Learning
                          </h3>
                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-ia">
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                              <span class="sr-only">Fermer</span>
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-4 md:p-5 space-y-6">
                          <div class="text-gray-300 space-y-6">
                              <!-- Introduction accrocheuse -->
                              <div class="bg-gradient-to-r from-blue-500/10 via-green-500/10 to-yellow-500/10 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-2">Entrez dans l'Ère de l'Intelligence Artificielle</h4>
                                  <p class="text-gray-300">
                                      Découvrez les fondements et applications avancées de l'IA et du Machine Learning. Une formation complète pour maîtriser les technologies qui façonnent l'avenir.
                                  </p>
                              </div>
            
                              <!-- Parcours d'apprentissage -->
                              <div class="grid md:grid-cols-2 gap-6">
                                  <!-- Fondamentaux -->
                                  <div class="bg-gray-700/30 p-4 rounded-lg">
                                      <h4 class="text-lg font-semibold text-blue-400 mb-3">Fondamentaux</h4>
                                      <ul class="space-y-2">
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Python pour Data Science</span>
                                          </li>
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Statistiques & Probabilités</span>
                                          </li>
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Algèbre linéaire</span>
                                          </li>
                                      </ul>
                                  </div>
            
                                  <!-- Technologies avancées -->
                                  <div class="bg-gray-700/30 p-4 rounded-lg">
                                      <h4 class="text-lg font-semibold text-green-400 mb-3">Technologies Avancées</h4>
                                      <ul class="space-y-2">
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Deep Learning avec TensorFlow</span>
                                          </li>
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Neural Networks avec PyTorch</span>
                                          </li>
                                          <li class="flex items-center">
                                              <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                  <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                              </svg>
                                              <span class="text-sm">Computer Vision & NLP</span>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
            
                              <!-- Applications pratiques -->
                              <div class="space-y-4">
                                  <h4 class="text-lg font-semibold text-yellow-400">Applications Pratiques</h4>
                                  <div class="grid md:grid-cols-3 gap-4">
                                      <div class="bg-gray-700/20 p-4 rounded-lg">
                                          <h5 class="font-medium mb-2">Vision par Ordinateur</h5>
                                          <p class="text-sm text-gray-400">Reconnaissance d'images et détection d'objets en temps réel</p>
                                      </div>
                                      <div class="bg-gray-700/20 p-4 rounded-lg">
                                          <h5 class="font-medium mb-2">Traitement du Langage</h5>
                                          <p class="text-sm text-gray-400">Analyse de sentiment et génération de texte</p>
                                      </div>
                                      <div class="bg-gray-700/20 p-4 rounded-lg">
                                          <h5 class="font-medium mb-2">Prédiction de Données</h5>
                                          <p class="text-sm text-gray-400">Modèles prédictifs et séries temporelles</p>
                                      </div>
                                  </div>
                              </div>
            
                              <!-- Environnement d'apprentissage -->
                              <div class="bg-gradient-to-r from-blue-500/10 to-green-500/10 p-4 rounded-lg">
                                  <h4 class="text-lg font-semibold text-white mb-3">Environnement d'Apprentissage</h4>
                                  <div class="grid md:grid-cols-2 gap-4">
                                      <div>
                                          <h5 class="text-cyan-400 font-medium mb-2">Infrastructure</h5>
                                          <ul class="space-y-1 text-sm">
                                              <li>• GPUs dédiés pour l'entraînement</li>
                                              <li>• Notebooks Jupyter préconfigurés</li>
                                              <li>• Datasets réels pour la pratique</li>
                                          </ul>
                                      </div>
                                      <div>
                                          <h5 class="text-cyan-400 font-medium mb-2">Support</h5>
                                          <ul class="space-y-1 text-sm">
                                              <li>• Mentorat personnalisé</li>
                                              <li>• Sessions de code review</li>
                                              <li>• Forum d'entraide actif</li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
            
                         

                                        <!-- Call to Action -->
                                        <div class="text-center">
                                            <button class="relative bg-gradient-to-r from-red-500 via-purple-500 to-green-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                                                Découvrir le Programme Complet
                                                <!-- Badge "À venir" -->
                                                <span class="absolute -top-2 -right-2 bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded-full">
                                                    À venir
                                                </span>
                                            </button>
                                            <div class="mt-4 flex justify-center items-center space-x-2">
                                                <!-- SVG Icon -->
                                                <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M3 3h18v2H3V3zm17 3V5h2v2h-2zm-5 0V5h2v2h-2zM8 5H6v2h2V5zm2 0v2h2V5h-2zm2 4H5v12h14V9h-7zM5 9H3v12h18V9h-2v10H5V9zm2 5h3v2H7v-2zm0 3h3v2H7v-2zm0-6h3v2H7v-2zm5 3h3v2h-3v-2zm0 3h3v2h-3v-2zm5-6h3v2h-3v-2zm0 3h3v2h-3v-2z"/>
                                                </svg>
                                                <p class="text-gray-400 text-sm">Prochain début de formation dans 2 semaines</p>
                                            </div>
                                        </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
  
  
  
  
           <!-- Modifier la carte pour ajouter le bouton -->
  <button data-modal-target="default-modal-cyber" data-modal-toggle="default-modal-cyber" type="button" class="text-start">
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
  </button>
  
  <!-- Modal -->
  <div id="default-modal-cyber" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                <h3 class="text-xl font-semibold text-cyan-400">
                    Formation Cybersécurité & Ethical Hacking
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-cyber">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-6">
                <div class="text-gray-300 space-y-6">
                    <!-- Introduction -->
                    <div class="bg-gradient-to-r from-red-500/10 via-purple-500/10 to-green-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-2">Devenez Expert en Sécurité Informatique</h4>
                        <p class="text-gray-300">
                            Plongez dans l'univers de la cybersécurité et maîtrisez les techniques de protection des systèmes d'information. Une formation complète pour devenir un professionnel de la sécurité informatique.
                        </p>
                    </div>
  
                    <!-- Parcours d'apprentissage -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Fondamentaux -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-red-400 mb-3">Sécurité Offensive</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-red-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Tests d'intrusion</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-red-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Exploitation de vulnérabilités</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-red-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Social Engineering</span>
                                </li>
                            </ul>
                        </div>
  
                        <!-- Sécurité Défensive -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-purple-400 mb-3">Sécurité Défensive</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-purple-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Pare-feu & IDS/IPS</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-purple-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Sécurisation des réseaux</span>
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 text-purple-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    <span class="text-sm">Analyse de malwares</span>
                                </li>
                            </ul>
                        </div>
                    </div>
  
                    <!-- Spécialisations -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-green-400">Spécialisations</h4>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-2">Web Security</h5>
                                <p class="text-sm text-gray-400">OWASP Top 10, XSS, SQLi, CSRF</p>
                            </div>
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-2">Mobile Security</h5>
                                <p class="text-sm text-gray-400">Android/iOS, Reverse Engineering</p>
                            </div>
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-2">Cloud Security</h5>
                                <p class="text-sm text-gray-400">AWS, Azure, Container Security</p>
                            </div>
                        </div>
                    </div>
  
                    <!-- Laboratoire Pratique -->
                    <div class="bg-gradient-to-r from-red-500/10 to-purple-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-3">Environnement de Pratique</h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h5 class="text-cyan-400 font-medium mb-2">Infrastructure</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• Lab virtuel sécurisé</li>
                                    <li>• Machines vulnérables</li>
                                    <li>• Outils professionnels</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-cyan-400 font-medium mb-2">Support</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• Encadrement expert</li>
                                    <li>• CTFs hebdomadaires</li>
                                    <li>• Communauté active</li>
                                </ul>
                            </div>
                        </div>
                    </div>
  
                   <!-- Call to Action -->
                        <!-- Call to Action -->
                        <div class="text-center">
                            <button class="relative bg-gradient-to-r from-red-500 via-purple-500 to-green-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                                Commencer votre Formation
                                <!-- Badge "À venir" -->
                                <span class="absolute -top-2 -right-2 bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded-full">
                                    À venir
                                </span>
                            </button>
                            <div class="mt-4 flex justify-center items-center space-x-2">
                                <!-- SVG Icon -->
                                <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 3h18v2H3V3zm17 3V5h2v2h-2zm-5 0V5h2v2h-2zM8 5H6v2h2V5zm2 0v2h2V5h-2zm2 4H5v12h14V9h-7zM5 9H3v12h18V9h-2v10H5V9zm2 5h3v2H7v-2zm0 3h3v2H7v-2zm0-6h3v2H7v-2zm5 3h3v2h-3v-2zm0 3h3v2h-3v-2zm5-6h3v2h-3v-2zm0 3h3v2h-3v-2z"/>
                                </svg>
                                <p class="text-gray-400 text-sm">Formation certifiante - Prochaine session dans 3 semaines</p>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
  </div>
  
            <!-- Carte Cloud Computing avec bouton -->
  <button data-modal-target="default-modal-cloud" data-modal-toggle="default-modal-cloud" type="button" class="text-start">
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
  </button>
  
  <!-- Modal -->
  <div id="default-modal-cloud" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                <h3 class="text-xl font-semibold text-cyan-400">
                    Formation Cloud Computing & DevOps
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-cloud">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-6">
                <div class="text-gray-300 space-y-6">
                    <!-- Introduction -->
                    <div class="bg-gradient-to-r from-orange-500/10 via-blue-500/10 to-green-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-2">Maîtrisez le Cloud & DevOps</h4>
                        <p class="text-gray-300">
                            Devenez expert en solutions cloud et pratiques DevOps modernes. Une formation complète couvrant les principales plateformes cloud et les outils essentiels de l'industrie.
                        </p>
                    </div>
  
                    <!-- Les 3 grands Cloud Providers -->
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- AWS -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-orange-400">Amazon Web Services</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-orange-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    EC2, S3, RDS
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-orange-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Lambda, CloudFormation
                                </li>
                            </ul>
                        </div>
  
                        <!-- Azure -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-blue-400">Microsoft Azure</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Virtual Machines, Storage
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Functions, DevOps
                                </li>
                            </ul>
                        </div>
  
                        <!-- Google Cloud -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-green-400">Google Cloud</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Compute Engine, Storage
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Kubernetes Engine
                                </li>
                            </ul>
                        </div>
                    </div>
  
                    <!-- DevOps Tools -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-cyan-400">Outils DevOps & Conteneurisation</h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Container Tools -->
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-3 text-blue-400">Conteneurisation</h5>
                                <ul class="space-y-2">
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        Docker & Docker Compose
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        Kubernetes & Helm
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        Container Security
                                    </li>
                                </ul>
                            </div>
  
                            <!-- CI/CD Tools -->
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-3 text-green-400">CI/CD & IaC</h5>
                                <ul class="space-y-2">
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                                        Jenkins & GitLab CI
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                                        Terraform & Ansible
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                                        GitHub Actions
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
  
                    <!-- Projets Pratiques -->
                    <div class="bg-gradient-to-r from-blue-500/10 to-green-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-3">Projets Pratiques</h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h5 class="text-cyan-400 font-medium mb-2">Infrastructure</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• Architecture microservices</li>
                                    <li>• Déploiement multi-cloud</li>
                                    <li>• Monitoring & Logging</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-cyan-400 font-medium mb-2">Automatisation</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• Pipeline CI/CD complet</li>
                                    <li>• Infrastructure as Code</li>
                                    <li>• Auto-scaling</li>
                                </ul>
                            </div>
                        </div>
                    </div>
  
                                        <!-- Call to Action -->
                    <div class="text-center">
                        <button class="relative bg-gradient-to-r from-red-500 via-purple-500 to-green-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                            Débuter dans le Cloud
                            <!-- Badge "À venir" -->
                            <span class="absolute -top-2 -right-2 bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded-full">
                                À venir
                            </span>
                        </button>
                        <div class="mt-4 flex justify-center items-center space-x-2">
                            <!-- SVG Icon -->
                            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3h18v2H3V3zm17 3V5h2v2h-2zm-5 0V5h2v2h-2zM8 5H6v2h2V5zm2 0v2h2V5h-2zm2 4H5v12h14V9h-7zM5 9H3v12h18V9h-2v10H5V9zm2 5h3v2H7v-2zm0 3h3v2H7v-2zm0-6h3v2H7v-2zm5 3h3v2h-3v-2zm0 3h3v2h-3v-2zm5-6h3v2h-3v-2zm0 3h3v2h-3v-2z"/>
                            </svg>
                            <p class="text-gray-400 text-sm">Certifications officielles incluses - Prochaine session dans 2 semaines</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </div>
  
            <!-- Carte Blockchain avec bouton -->
  <button data-modal-target="default-modal-blockchain" data-modal-toggle="default-modal-blockchain" type="button" class="text-start">
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
  </button>
  
  <!-- Modal -->
  <div id="default-modal-blockchain" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-gray-800 rounded-lg shadow border border-cyan-500/30">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-700">
                <h3 class="text-xl font-semibold text-purple-400">
                    Formation Blockchain & Web3
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-700 hover:text-gray-100 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-blockchain">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-6">
                <div class="text-gray-300 space-y-6">
                    <!-- Introduction -->
                    <div class="bg-gradient-to-r from-purple-500/10 via-yellow-500/10 to-blue-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-2">Devenez Développeur Blockchain</h4>
                        <p class="text-gray-300">
                            Plongez dans l'univers révolutionnaire de la blockchain et du Web3. Apprenez à développer des applications décentralisées et des smart contracts.
                        </p>
                    </div>
  
                    <!-- Technologies Principales -->
                    <div class="grid md:grid-cols-3 gap-6">
                        <!-- Ethereum -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-purple-400">Ethereum</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-purple-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Architecture EVM
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-purple-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Gaz & Transactions
                                </li>
                            </ul>
                        </div>
  
                        <!-- Smart Contracts -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-yellow-400">Solidity</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Smart Contracts
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Tokens & NFTs
                                </li>
                            </ul>
                        </div>
  
                        <!-- Web3 -->
                        <div class="bg-gray-700/30 p-4 rounded-lg">
                            <div class="flex items-center mb-3">
                                <h4 class="text-lg font-semibold text-blue-400">Web3</h4>
                            </div>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    DApps
                                </li>
                                <li class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                    </svg>
                                    Wallets & Web3.js
                                </li>
                            </ul>
                        </div>
                    </div>
  
                    <!-- Développement Avancé -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-semibold text-purple-400">Développement Blockchain Avancé</h4>
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Smart Contracts Avancés -->
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-3 text-yellow-400">Smart Contracts Avancés</h5>
                                <ul class="space-y-2">
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                                        DeFi & Yield Farming
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                                        DAO & Gouvernance
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                                        Sécurité & Audits
                                    </li>
                                </ul>
                            </div>
  
                            <!-- DApps Development -->
                            <div class="bg-gray-700/20 p-4 rounded-lg">
                                <h5 class="font-medium mb-3 text-blue-400">DApps Development</h5>
                                <ul class="space-y-2">
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        React & Web3
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        IPFS & Décentralisation
                                    </li>
                                    <li class="flex items-center text-sm">
                                        <span class="w-2 h-2 bg-blue-400 rounded-full mr-2"></span>
                                        Testing & Déploiement
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
  
                    <!-- Projets Pratiques -->
                    <div class="bg-gradient-to-r from-purple-500/10 to-blue-500/10 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold text-white mb-3">Projets Pratiques</h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h5 class="text-yellow-400 font-medium mb-2">DeFi & NFTs</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• DEX & AMM</li>
                                    <li>• Collection NFT</li>
                                    <li>• Staking Platform</li>
                                </ul>
                            </div>
                            <div>
                                <h5 class="text-blue-400 font-medium mb-2">Web3 Apps</h5>
                                <ul class="space-y-1 text-sm">
                                    <li>• Marketplace NFT</li>
                                    <li>• DAO Dashboard</li>
                                    <li>• DApp Portfolio</li>
                                </ul>
                            </div>
                        </div>
                    </div>
  

                                        <!-- Call to Action -->
                                        <div class="text-center">
                                            <button class="relative bg-gradient-to-r from-red-500 via-purple-500 to-green-500 text-white px-6 py-3 rounded-lg font-medium hover:scale-105 transition-transform duration-300">
                                                Commencer l'Aventure Web3
                                                <!-- Badge "À venir" -->
                                                <span class="absolute -top-2 -right-2 bg-yellow-400 text-black text-xs font-semibold px-2 py-1 rounded-full">
                                                    À venir
                                                </span>
                                            </button>
                                            <div class="mt-4 flex justify-center items-center space-x-2">
                                                <!-- SVG Icon -->
                                                <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M3 3h18v2H3V3zm17 3V5h2v2h-2zm-5 0V5h2v2h-2zM8 5H6v2h2V5zm2 0v2h2V5h-2zm2 4H5v12h14V9h-7zM5 9H3v12h18V9h-2v10H5V9zm2 5h3v2H7v-2zm0 3h3v2H7v-2zm0-6h3v2H7v-2zm5 3h3v2h-3v-2zm0 3h3v2h-3v-2zm5-6h3v2h-3v-2zm0 3h3v2h-3v-2z"/>
                                                </svg>
                                                <p class="text-gray-400 text-sm">Formation incluant support technique 24/7 - Places limitées</p>
                                            </div>
                                        </div>
                </div>
            </div>
        </div>
    </div>
  </div>
        </div>
  
        @if (str_contains($route, 'contact'))
        @else
            <!-- Bouton Voir plus -->
            <div class="text-center mt-12">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-500 text-white font-semibold hover:opacity-90 transition-opacity">
                    <!--Découvrir toutes nos formations--> À Vénir bientôt Contactez nous pour en savoir plus
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

        @endif
        
    </div>
  </section>

  
    