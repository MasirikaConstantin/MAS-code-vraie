<?php $__env->startSection('section',""); ?>

<?php $__env->startSection("contenus"); ?>

  <div class="max-w-md mx-auto">
      <!-- Session Status -->
      <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>

      <div class="bg-gray-800/30 backdrop-blur-xl rounded-2xl shadow-2xl p-8 space-y-8">
          <!-- Logo -->
          <div class="flex justify-center">
              <img src="<?php echo e(asset('mas product.png')); ?>" alt="Logo" class="h-20 w-auto transform hover:scale-105 transition-transform duration-300">
          </div>

          <!-- Title -->
          <h1 class="text-3xl font-bold text-center bg-gradient-to-r from-purple-400 to-pink-600 text-transparent bg-clip-text">
              <?php echo e(__('Log in')); ?>

          </h1>

          <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
              <?php echo csrf_field(); ?>

              <!-- Email Input -->
              <div class="relative"  >
                  <input type="email"
                         name="email"
                         value="<?php echo e(old('email')); ?>"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Email"
                         id="email">
                  <label for="email"
                  
                         class="absolute left-4 -top-6 text-xl  text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      Email address
                  </label>
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-red-400 text-sm"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                      <?php echo e(__('Password')); ?>

                  </label>
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <p class="mt-2 text-red-400 text-sm"><?php echo e($message); ?></p>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>

              <!-- Remember Me -->
              <div class="flex items-center">
                  <input type="checkbox"
                         id="remember_me"
                         name="remember"
                         class="w-4 h-4 rounded border-gray-600 text-purple-500 focus:ring-purple-500 focus:ring-offset-gray-800">
                  <label for="remember_me" class="ml-2 text-sm text-gray-400">
                      <?php echo e(__('Remember me')); ?>

                  </label>
              </div>

              <!-- Submit Button -->
              <button type="submit"
                      class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium rounded-lg transform hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                  <?php echo e(__('Log in')); ?>

              </button>

              <!-- Forgot Password -->
              <?php if(Route::has('password.request')): ?>
                  <div class="text-center">
                      <a href="<?php echo e(route('password.request')); ?>"
                         class="text-sm text-purple-400 hover:text-purple-300 transition-colors">
                          <?php echo e(__('Forgot your password?')); ?>

                      </a>
                  </div>
              <?php endif; ?>

                  <div class="text-center">
                      <a href="<?php echo e(route('register')); ?>"
                         class="text-sm text-purple-400 hover:text-purple-300 transition-colors">
                          <?php echo e(__('Register')); ?>

                      </a>
                  </div>
          </form>
      </div>

      
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mascodep/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>