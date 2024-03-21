

<?php $__env->startSection('title', "Bienvenue"); ?>

<?php $__env->startSection('content'); ?>
    <h1>Mon blog</h1>
    <article>
        <h1><?php echo e($post->title); ?></h1>
        <p>slug: <?php echo e($post->slug); ?></p>
        <p>contenu: <br><?php echo e($post->content); ?></p>
        <p><?php echo e($post->created_at); ?></p>
        <p><?php echo e($post->updated_at); ?></p>
        <p>category_id: <?php echo e($post->category_id); ?></p>
        <p>Catégorie: <?php echo e($post->category?->name); ?></p>
    </article>
    <div class="hidden md:flex space-x-16">
        <a href="<?php echo e(route('blog.edit', $post->id)); ?>" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Edit</a>
        <form action="<?php echo e(route('blog.posts.destroy', $post->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        <button type="submit" class="py-2 px-3 bg-red-500 text-white rounded hover:bg-blue-600 transition duration-300">Delete</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accueil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Randrianaivo\OneDrive\Documents\PHP\tuto_laravel\resources\views/blog/show.blade.php ENDPATH**/ ?>