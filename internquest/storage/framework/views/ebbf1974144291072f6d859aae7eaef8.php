<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Accueil'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<nav class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center">
            <div class="flex ">   
                <div class="text-gray-700 hidden md:flex space-x-16">
                    <a href="<?php echo e(route('internquest/')); ?>" class="py-5 px-3 hover:text-black">Accueil</a>
                    <a href="<?php echo e(route('offres.index')); ?>" class="py-5 px-3 hover:text-black">Offres</a>
                    <a href="#" class="py-5 px-3 hover:text-black">Notifications</a>   
                    <a href="<?php echo e(route('entreprises.index')); ?>" class="py-5 px-3 hover:text-black">Pour les entreprises</a>
                    <a href="#" class="py-5 px-3 hover:text-black">Publier</a>
                    <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('auth.show')); ?>" class="py-5 px-3 hover:text-black"><?php echo e(Auth::user()->username); ?></a>
                    <form action="<?php echo e(route('auth.logout')); ?>" method="POST">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <button class="py-5 px-3 hover:text-black">Se déconnecter</button>
                    </form>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <a href="<?php echo e(route('auth.login')); ?>" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300"> se connecter
                            <a href="<?php echo e(route('users.create')); ?>" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">S'inscrire</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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
<script></script>
</body>
</html><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/accueil.blade.php ENDPATH**/ ?>