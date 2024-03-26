<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>

    @if ($errors->any()) {
        <div>
            <div style="font-style: italic; color:red;">Something went wrong</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    }
    @endif
    <div class="page-1">
        <form action="{{route('users.update')}}" method="POST">
            @csrf
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                <input type="text" name="nom" id="nom" required placeholder="Nom" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('nom')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Prenom</label>
                <input type="text" name="prenom" id="prenom" required placeholder="Prenom" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('prenom')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Email</label>
                <input type="email" name="email" id="email" required placeholder="email@example.fr" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('email')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                <input type="password" name="password" id="password" required placeholder="password" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <span>
                    @error('password')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                </span>
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Identifiant</label>
                <input type="text" name="username" id="username" required placeholder="Identifiant" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('username')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Role</label>
                <input type="number" name="role" id="role" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('id_role')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Centre</label>
                <input type="text" name="centre" id="centre" required placeholder="Centre" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('centre')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div>
                <<button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">S'enregistrer</button>
            </div>
        </form>
    </div>
    <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;">
        <div class="w-full p-10 flex flex-col items-center">
            <button onclick="closesignin()" class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            <h2 class="text-4xl text-blue-600 mb-6">Sign in</h2>
            <form action="#" class="w-full">
                <div class="relative mb-6">
                    <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <input type="email" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">email</label>
                </div>
                <div class="relative mb-6">
                    <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <input type="email" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">confirmer email</label>
                </div>
                <div class="relative mb-6">
                    <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <input type="password" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">mot de passe</label>
                </div>
                <div class="relative mb-6">
                    <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                    <input type="password" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">confirmer mot de passe</label>
                </div>
                <div class="flex justify-between items-center mb-4">
                    <label class="flex items-center text-base text-gray-700 font-medium">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">se rappeler de moi
                    </label>
                    <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
                </div>
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Login</button>
                <div class="text-center text-sm text-gray-700 mt-4">
                    j'ai deja un compte <a href="#" class="font-bold hover:underline">se connecter</a>
                </div> 
            </form>
        </div>
    </dialog>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>