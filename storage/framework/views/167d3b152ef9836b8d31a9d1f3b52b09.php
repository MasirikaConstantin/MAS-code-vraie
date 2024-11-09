<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['status']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['status']); ?>
<?php foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($status): ?>
    <div <?php echo e($attributes->merge(['class' => 'bg-green-100 mb-4 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center'])); ?>>
        <?php echo e($status); ?>

    </div>

   
<?php endif; ?>
<?php /**PATH /home/mascodep/public_html/blog.mascodeproduct.com/site/resources/views/components/auth-session-status.blade.php ENDPATH**/ ?>