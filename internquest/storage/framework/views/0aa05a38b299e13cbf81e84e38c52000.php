<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
    <nav style="display: flex; justify-content:right;">
        <div class="user_state">
            <?php if(auth()->guard()->check()): ?>
                <p><?php echo e(Auth::user()->name); ?></p>
                <form action="<?php echo e(route('auth.logout')); ?>" method="POST">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button>Se déconnecter</button>
                </form>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('auth.login')); ?>"> Se connecter</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php elseif(session('error')): ?>
            <div class="alert alert-error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH C:\Users\Randrianaivo\OneDrive\Documents\PHP\tuto_laravel\resources\views/base.blade.php ENDPATH**/ ?>