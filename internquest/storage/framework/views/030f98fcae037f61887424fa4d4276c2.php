<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php if($errors->any()): ?> {
        <div>
            <div>Something went wrong</div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    }
    <?php endif; ?>
    <form action="" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" autofocus>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?php echo e(old('password')); ?>">
        </div>
        <div>
            <label for="password_confirmation">Password_confirmation</label>
            <input type="password" name="password" id="password_confirmation">
        </div>
        <div>
            <label for="remember"></label>
            <input type="checkbox" id="remeber" name="remeber">
            <span class="">Remember me</span>
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</body>
</html><?php /**PATH C:\Users\Randrianaivo\OneDrive\Documents\PHP\tuto_laravel\resources\views/auth/register.blade.php ENDPATH**/ ?>