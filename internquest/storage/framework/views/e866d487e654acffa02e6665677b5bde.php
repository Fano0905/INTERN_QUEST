<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div id="login" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="w-full p-10 flex flex-col items-center">
        <h2 class="text-4xl text-blue-600 mb-6">Login</h2>
        <form action="<?php echo e(route('auth.login')); ?>" class="w-full" method="POST">
            <?php echo csrf_field(); ?>
            <div class="relative mb-6">
                <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <input type="email" name="email" id="email" required placeholder="" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">email</label>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color: red"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="relative mb-6">
                <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <input type="password" name="password" id="password" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">mot de passe</label>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p style="color: red;"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center text-base text-gray-700 font-medium">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">se rappeler de moi
                </label>
                <a href="#" class="text-sm text-gray-700 hover:underline mx-3">mot de passe oublié</a>
            </div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Login</button>
            <div class="text-center text-sm text-gray-700 mt-4">
                je n'ai pas de compte <a href="<?php echo e(route('users.create')); ?>" class="font-bold hover:underline">s'inscrire</a>
            </div> 
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/auth/login.blade.php ENDPATH**/ ?>