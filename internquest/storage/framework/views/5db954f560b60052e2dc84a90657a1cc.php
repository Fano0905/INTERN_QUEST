<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title><?php echo $__env->yieldContent('title', 'Basecontent'); ?></title>
</head>
<body>
    <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
        <div class="w-full p-10 flex flex-col items-center">
            <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closesignin(), preventReload(event)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
            <h2 class="text-2xl text-blue-600 mb-6">S'inscrire</h2>
            <form action="<?php echo e(route('users.store')); ?>" method="POST" class = w-full>
                <?php echo csrf_field(); ?>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                    <input type="text" name="lname" id="lname" required placeholder="Last Name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <?php $__errorArgs = ['lname'];
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
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Prénom</label>
                    <input type="text" name="fname" id="fname" required placeholder="First name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <?php $__errorArgs = ['fname'];
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
                <div class="relative mb-6">
                    <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mail</label>
                    <input type="email" name="mail" id="mail" required placeholder="email@example.fr" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <span>
                        <?php $__errorArgs = ['mail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: red;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </span>
                </div>
                <div class="relative mb-6">
                    <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                    <input type="password" name="password" id="password" required placeholder="password" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <span>
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
                    </span>
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Pseudo</label>
                    <input type="text" name="username" id="username" required placeholder="Identifiant" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <span>
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: red;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </span>
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Role</label>
                    <select name="role" id="role" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <option value="Admin">Admin</option>
                        <option value="Pilote">Pilote</option>
                        <option value="Etudiant">Etudiant</option>
                    </select>
                    <span>
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: red;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </span>
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Localisation</label>
                    <input type="text" name="location" id="location" required placeholder="Location" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <span>
                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p style="color: red;"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </span>
                </div>
            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center text-base text-gray-700 font-medium">
                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">Se rappeler de moi
                </label>
                <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
            </div>
            <div>
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Envoyer demande</button>
            </div>
        </form>
    </div>
    </dialog>
</body>
</html><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/base.blade.php ENDPATH**/ ?>