

<h1>Vous n'aimez pas un article?</h1>

<p>Vous avez la possibilité de le supprimer</p>

<h2>Choisissez l'article que vous voulez supprimer</h2>

<div class="del">
    <form action="" method="post">
        <?php echo csrf_field(); ?>
        <label for="ArtToDel">Article à supprimer: </label>
        <input type="number">
        <button>Supprimer</button>
    </form>
</div>

<div class="response">
    <?php if(session('success')): ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article>
                <h2><?php echo e($post->title); ?></h2>    
                <p><?php echo e($post->content); ?></p>
                <p><?php echo e($post->id); ?></p>
                <p><?php echo e($post->slug); ?></p>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>Echec</p>
    <?php endif; ?>
</div>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Randrianaivo\OneDrive\Documents\PHP\tuto_laravel\resources\views/blog/delete.blade.php ENDPATH**/ ?>