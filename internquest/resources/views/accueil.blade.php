<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Accueil')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>


<nav class="bg-gray-100" id ="nav_bar">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center">
            <div class="flex ">   
                <div class="text-gray-700 hidden md:flex space-x-16">
                    <div class="py-5 px-3 hover:text-black">
                        <a href="{{route('internquest/')}}">
                        <ion-icon name="home"></ion-icon>
                        Accueil</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href="{{route('offres.index')}}"><ion-icon name="briefcase"></ion-icon>
                            Offres</a>
                    </div>
                    <a href="#" class="py-5 px-3 hover:text-black">Notifications</a>
                    <div class="py-5 px-3 hover:text-black"><a href="{{route('entreprises.index')}}">
                        <ion-icon name="business"></ion-icon>
                        Entreprises</a>
                    </div>
                    <a href="#" class="py-5 px-3 hover:text-black">Publier</a>
                    @auth
                    <div class="py-5 px-3 hover:text-black">
                        <ion-icon name="person-circle"></ion-icon>
                        <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                    </div>
                    <form action="{{route('auth.logout')}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="py-5 px-3 hover:text-black">Se déconnecter</button>
                    </form>
                    @endauth
                    @guest
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <a href="{{route('auth.login')}}" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300"> se connecter</a>
                            <a href="{{ route('users.create') }}" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300" onclick="toggleDialog(), preventReload(event)">S'inscrire</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @elseif (session('error'))
        <div class="alert alert-error">
            {{session('error')}}
        </div>
    @endif
    @yield('content')
</div>
    <div>
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
        <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
            <div class="page-1">
                <form action="{{route('users.store')}}" method="POST">
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
                        <div class="relative mb-6">
                            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Role</label>
                            <select name="role" id="role" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                                <option value="Admin">Admin</option>
                                <option value="Pilote">Pilote</option>
                                <option value="Etudiant">Etudiant</option>
                            </select>
                            @error('role')
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
        </dialog>
    </div>
<script>
    function toggleDialog() {
        var dialog = document.getElementById('signin_dialog');
        var nav = document.getElementById('nav_bar');

        if (dialog.style.display === 'none' || dialog.style.display === '') {
            dialog.style.display = 'block';
            nav.style.display = 'none';
        } else {
            dialog.style.display = 'none';
        }
    }
    function preventReload(event) {
                event.preventDefault();
    }
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>