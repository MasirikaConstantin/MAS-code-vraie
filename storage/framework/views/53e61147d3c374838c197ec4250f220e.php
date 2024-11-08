<?php $__env->startSection('section',""); ?>

<?php $__env->startSection("contenus"); ?>
  <div class="max-w-md mx-auto">
      <div class="bg-gray-800/30 backdrop-blur-xl rounded-2xl shadow-2xl p-8 space-y-8">
          <!-- Title -->
          <h1 class="text-3xl font-bold text-center bg-gradient-to-r from-purple-400 to-pink-600 text-transparent bg-clip-text">
              <?php echo e(__('Create Account')); ?>

          </h1>

          <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-6">
              <?php echo csrf_field(); ?>

              <!-- Name Input -->
              <div class="relative">
                  <input type="text"
                         name="name"
                         value="<?php echo e(old('name')); ?>"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Name"
                         id="name">
                  <label for="name"
                         class="absolute left-4 -top-6 text-sm text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      <?php echo e(__('Name')); ?>

                  </label>
                  <?php $__errorArgs = ['name'];
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

              <!-- Email Input -->
              <div class="relative">
                  <input type="email"
                         name="email"
                         value="<?php echo e(old('email')); ?>"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Email"
                         id="email">
                  <label for="email"
                         class="absolute left-4 -top-6 text-sm text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      <?php echo e(__('Email')); ?>

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

              <!-- Confirm Password Input -->
              <div class="relative">
                  <input type="password"
                         name="password_confirmation"
                         class="peer w-full h-12 px-4 bg-gray-700/50 rounded-lg border border-gray-600 text-white placeholder-transparent focus:border-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500/30 transition-all"
                         placeholder="Confirm Password"
                         id="password_confirmation">
                  <label for="password_confirmation"
                         class="absolute left-4 -top-6 text-sm text-gray-400 peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-6 peer-focus:text-purple-500 peer-focus:text-sm transition-all">
                      <?php echo e(__('Confirm Password')); ?>

                  </label>
                  <?php $__errorArgs = ['password_confirmation'];
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

              <!-- Actions -->
              <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4">
                  <a href="<?php echo e(route('login')); ?>"
                     class="text-sm text-purple-400 hover:text-purple-300 transition-colors underline">
                      <?php echo e(__('Already registered?')); ?>

                  </a>

                  <button type="submit"
                          class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium rounded-lg transform hover:scale-[1.02] transition-all focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                      <?php echo e(__('Register')); ?>

                  </button>
              </div>
          </form>

          <!-- Decorative Elements -->
          <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 w-32 h-32 bg-purple-500/10 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 left-0 translate-y-12 -translate-x-12 w-32 h-32 bg-pink-500/10 rounded-full blur-3xl"></div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/masirika-constantin/Vidéos/Mas-Code/resources/views/auth/register.blade.php ENDPATH**/ ?>