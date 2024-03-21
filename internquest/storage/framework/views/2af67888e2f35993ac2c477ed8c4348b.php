

<?php $__env->startSection('title', "Page d'accueil"); ?>

<?php $__env->startSection('content'); ?>
    <h1>Mon blog</h1>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article>
            <h2><?php echo e($post->title); ?></h2>    
            <p>Id: <?php echo e($post->id); ?></p>
            <p>Slug: <?php echo e($post->slug); ?></p>
            <p>Contenu: <br><?php echo e($post->content); ?></p>
            <?php if($post->category): ?>
                <p>Catégorie: <?php echo e($post->category?->name); ?></p>
            <?php endif; ?>
            <?php if(!$post->tags->isEmpty()): ?>
                Tags :
                <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-secondary"><?php echo e($tag->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <p><a href="<?php echo e(route('blog.show', ['slug' => $post->slug, 'post' => $post->id])); ?>">Lire la suite</a></p>
        </article>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($posts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('accueil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/blog/index.blade.php ENDPATH**/ ?>