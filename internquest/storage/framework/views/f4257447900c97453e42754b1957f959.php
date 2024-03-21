

<?php $__env->startSection('title', "Créer un article"); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('blog.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/blog/create.blade.php ENDPATH**/ ?>