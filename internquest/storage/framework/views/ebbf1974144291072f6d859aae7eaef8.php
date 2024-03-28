<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title', 'Accueil'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="w-full h-screen bg-no-repeat bg-cover" style="background-image: url('/img/image-bg.jpg')">


<nav class="bg-gray-100" id ="nav_bar">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center">
            <div class="flex ">   
                <div class="text-gray-700 hidden md:flex space-x-16">
                    <div class="py-5 px-3 hover:text-black">
                        <a href="<?php echo e(route('internquest/')); ?>">
                        <ion-icon name="home"></ion-icon>
                        Home</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href="<?php echo e(route('offers.index')); ?>"><ion-icon name="briefcase"></ion-icon>
                            Offers</a>
                    </div>
                    <a href="#" class="py-5 px-3 hover:text-black">Notifications</a>
                    <div class="py-5 px-3 hover:text-black"><a href="<?php echo e(route('companies.index')); ?>">
                        <ion-icon name="business"></ion-icon>
                        Companies</a>
                    </div>
                    <a href="#" class="py-5 px-3 hover:text-black">Publish</a>
                    <?php if(auth()->guard()->check()): ?>
                    <div class="py-5 px-3 hover:text-black">
                        <ion-icon name="person-circle"></ion-icon>
                        <a href="<?php echo e(route('auth.show')); ?>"><?php echo e(Auth::user()->username); ?></a>
                    </div>
                    <form action="<?php echo e(route('auth.logout')); ?>" method="POST">
                        <?php echo method_field('delete'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="py-5 px-3 hover:text-black">
                            <ion-icon name="log-out"></ion-icon>
                            <button>Log Out</button>
                        </div>
                    </form>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="text-gray-700 items-center hidden md:flex space-x-8">
                            <a href="#" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300" onclick="login(), preventReload(event)" >Sign in</a>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="person-add"></ion-icon>
                                <a href="#" onclick="signin(), preventReload(event)">Sign up</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<div> </div>

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
    <div>
        <?php if($errors->any()): ?> {
            <div>
                <div style="font-style: italic; color:red;">Something went wrong</div>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        }
        <?php endif; ?>

        <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-110 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
            <div class="w-full p-10 flex flex-col items-center">
            <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closesignin(), preventReload(event)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
            <h2 class="text-4xl text-blue-600 mb-6">S'inscrire</h2>
                <form action="<?php echo e(route('users.store')); ?>" method="POST" class = w-full>
                    <?php echo csrf_field(); ?>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                        <input type="text" name="nom" id="nom" required placeholder="Nom" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <?php $__errorArgs = ['nom'];
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
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Prenom</label>
                        <input type="text" name="prenom" id="prenom" required placeholder="Prenom" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <?php $__errorArgs = ['prenom'];
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
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Email</label>
                        <input type="email" name="email" id="email" required placeholder="email@example.fr" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <?php $__errorArgs = ['email'];
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
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Identifiant</label>
                        <input type="text" name="username" id="username" required placeholder="Identifiant" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
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
                    </div>
                        <div class="relative mb-6">
                            <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Role</label>
                            <select name="role" id="role" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                                <option value="Admin">Admin</option>
                                <option value="Pilote">Pilote</option>
                                <option value="Etudiant">Etudiant</option>
                            </select>
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
                        </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Centre</label>
                        <input type="text" name="centre" id="centre" required placeholder="Centre" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <?php $__errorArgs = ['centre'];
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
                <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
                </div>
                    <div>
                        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Soumettre la demande</button>
                    </div>
                </form>
            </div>
        </dialog>
        <dialog id="login_dialog" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
        <div class="w-full p-10 flex flex-col items-center">
        <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closelogin(), preventReload(event)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            </button>
        <h2 class="text-4xl text-blue-600 mb-6">Se connecter</h2>
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
    </dialog>
<script>
function login(){
    console.log("close signin");
    const signin_dialog = document.getElementById("signin_dialog");
    signin_dialog.style.display = "none";
    console.log("Open login");
    const login_dialog = document.getElementById("login_dialog");
    login_dialog.style.display = "flex";
    
};
function signin(){
    console.log("close login");
    const login_dialog = document.getElementById("login_dialog");
    login_dialog.style.display = "none";
    console.log("Open signin");
    const signin_dialog = document.getElementById("signin_dialog");
    signin_dialog.style.display = "flex";
};
function closelogin(){
    console.log("close login");
    const login_dialog = document.getElementById("login_dialog");
    login_dialog.style.display = "none";
};
function closesignin(){
    console.log("close signin");
    const signin_dialog = document.getElementById("signin_dialog");
    signin_dialog.style.display = "none";
};
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html><?php /**PATH C:\Users\Randrianaivo\Repo\INTERN_QUEST\internquest\resources\views/accueil.blade.php ENDPATH**/ ?>