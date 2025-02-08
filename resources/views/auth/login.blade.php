@extends("base")
@section('section',"")
@section('titre',"Se Connecter")

@section("contenus")

  <div class="max-w-md mx-auto">
      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <div class="bg-gray-800/30 backdrop-blur-xl rounded-2xl shadow-2xl p-8 space-y-8">
          <!-- Logo -->
          <div class="flex justify-center">
              <img src="{{ asset('mas product.png') }}" alt="Logo" class="h-20 w-auto transform hover:scale-105 transition-transform duration-300">
          </div>

          <!-- Title -->
          <h1 class="text-3xl font-bold text-center bg-gradient-to-r from-purple-400 to-pink-600 text-transparent bg-clip-text">
              {{ __('Log in') }}
          </h1>

          <form method="POST" action="{{route('login')}}" class="space-y-6">
              @csrf

              <!-- Email Input -->
              <div class="relative"  >
                  <input type="email"
                         name="email"
                         value="{{ old('email') }}"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Email"
                         id="email">
                  <label for="email"
                  
                         class="absolute left-4 -top-6 text-xl  text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      Email address
                  </label>
                  @error('email')
                      <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                  @enderror
              </div>

              <!-- Password Input -->
              <div class="relative">
                  <input type="password"
                         name="password"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Password"
                         id="password">
                  <label for="password"
                         class="absolute left-4 -top-6 text-sm text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      {{ __('Password') }}
                  </label>
                  @error('password')
                      <p class="mt-2 text-red-400 text-sm">{{ $message }}</p>
                  @enderror
              </div>

              <!-- Remember Me -->
              <div class="flex items-center">
                  <input type="checkbox"
                         id="remember_me"
                         name="remember"
                         class="w-4 h-4 rounded border-gray-600 text-purple-500 focus:ring-purple-500 focus:ring-offset-gray-800">
                  <label for="remember_me" class="ml-2 text-sm text-gray-400">
                      {{ __('Remember me') }}
                  </label>
              </div>

              <!-- Submit Button -->
              <button type="submit"
                      class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium rounded-lg transform hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                  {{ __('Log in') }}
              </button>

              <!-- Forgot Password -->
              @if (Route::has('password.request'))
                  <div class="text-center">
                      <a href="{{ route('password.request') }}"
                         class="text-sm text-purple-400 hover:text-purple-300 transition-colors">
                          {{ __('Forgot your password?') }}
                      </a>
                  </div>
              @endif

                  <div class="text-center">
                      <a href="{{ route('register') }}"
                         class="text-sm text-purple-400 hover:text-purple-300 transition-colors">
                          {{ __('Register') }}
                      </a>
                  </div>
          </form>
      </div>

      
</div>

@endsection