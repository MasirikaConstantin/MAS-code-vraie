<?php if (isset($component)) { $__componentOriginalaa758e6a82983efcbf593f765e026bd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa758e6a82983efcbf593f765e026bd9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::message'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: #fff; border-radius: 15px; padding: 2rem; margin: -2rem;">


<?php if(! empty($greeting)): ?>
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    <?php echo e($greeting); ?>

</h1>
<?php else: ?>
<?php if($level === 'error'): ?>
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #ff416c 0%, #ff4b2b 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    <?php echo app('translator')->get('Whoops!'); ?>
</h1>
<?php else: ?>
<h1 style="font-size: 2.5rem; background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1.5rem;">
    <?php echo app('translator')->get('Hello!'); ?>
</h1>
<?php endif; ?>
<?php endif; ?>


<div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
    <?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p style="color: #e2e8f0; line-height: 1.6; margin-bottom: 1rem;">
        <?php echo e($line); ?>

    </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php if(isset($actionText)): ?>
<?php
    $color = match ($level) {
        'success' => 'background: linear-gradient(to right, #00b09b, #96c93d)',
        'error' => 'background: linear-gradient(to right, #ff416c, #ff4b2b)',
        default => 'background: linear-gradient(to right, #4facfe, #00f2fe)',
    };
?>
<div style="text-align: center; margin: 2rem 0;">
    <a href="<?php echo e($actionUrl); ?>" 
       style="<?php echo e($color); ?>; 
              color: white;
              text-decoration: none;
              padding: 1rem 2rem;
              border-radius: 50px;
              font-weight: bold;
              text-transform: uppercase;
              letter-spacing: 1px;
              box-shadow: 0 4px 15px rgba(0,0,0,0.2);
              transition: all 0.3s ease;">
        <?php echo e($actionText); ?>

    </a>
</div>
<?php endif; ?>


<div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 10px; padding: 1.5rem; margin-bottom: 2rem;">
    <?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p style="color: #e2e8f0; line-height: 1.6; margin-bottom: 1rem;">
        <?php echo e($line); ?>

    </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; margin-top: 2rem;">
    <?php if(! empty($salutation)): ?>
    <p style="color: #a0aec0;"><?php echo e($salutation); ?></p>
    <?php else: ?>
    <p style="color: #a0aec0;">
        <?php echo app('translator')->get('Regards'); ?>,<br>
        <span style="background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">
            <?php echo e(config('app.name')); ?>

        </span>
    </p>
    <?php endif; ?>
</div>


<?php if(isset($actionText)): ?>
 <?php $__env->slot('subcopy', null, []); ?> 
<div style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.875rem; color: #718096;">
    <?php echo app('translator')->get(
        "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser:',
        [
            'actionText' => $actionText,
        ]
    ); ?>
    <div style="margin-top: 0.5rem;">
        <a href="<?php echo e($actionUrl); ?>" style="color: #4facfe; word-break: break-all;"><?php echo e($displayableActionUrl); ?></a>
    </div>
</div>
 <?php $__env->endSlot(); ?>
<?php endif; ?>

</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $attributes = $__attributesOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $component = $__componentOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__componentOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?><?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/vendor/notifications/email.blade.php ENDPATH**/ ?>