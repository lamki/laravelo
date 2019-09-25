<?php $__env->startSection('content'); ?>

<h1><?php echo e($title); ?></h1>
<hr>
<p>This page is for Sales Representative from ABC Inc.</p>
    <?php if(Auth::guest()): ?>
        Click <a href="/login">here</a> to login!
    <?php endif; ?>
<br><br>
<h1>News</h1>
<hr>
<p>Slower market projection for next quater! Buckle up buddy!</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/public_html/tahi/resources/views/pages/index.blade.php ENDPATH**/ ?>