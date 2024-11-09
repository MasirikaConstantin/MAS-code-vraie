<!DOCTYPE html>
<html class="h-100" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
<script src="<?php echo e(asset('color-modes.js')); ?>"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

       
        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
                        font-family: 'Google';
                        src: url('<?php echo e(asset('ProductSans-Light.ttf')); ?>');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google' !important;
                    }
                    
    </style>
    </head>
    <body class="d-flex flex-column h-100">
        <div class=" bg-body-100">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-body shadow">
                    <div class="max-w-7xl text-body bg-body mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
    </body>
</html>
<?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/layouts/app.blade.php ENDPATH**/ ?>