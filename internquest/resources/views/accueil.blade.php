<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Accueil')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body style="height: 200dvh">
<div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">

    @guest
        <nav class="bg-gray-100" id ="nav_guest">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('internquest/')}}">
                                <ion-icon name="home"></ion-icon>
                                Accueil</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="text-gray-700 items-center hidden md:flex space-x-8">
                                <a href="#" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300" onclick="login(), preventReload(event)" >Se connecter</a>
                                <div class="py-3 px-1 hover:text-black">
                                    <ion-icon name="person-add"></ion-icon>
                                    <a href="#" onclick="signin(), preventReload(event)">S'inscrire</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @endguest

    @auth
        @if (Auth::user()->role == 'Admin')
            <nav class="bg-gray-100" id ="nav_admin">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="flex justify-center">
                        <div class="flex ">   
                            <div class="text-gray-700 hidden md:flex space-x-16">
                                <div class="py-3 px-1 hover:text-black">
                                    <a href="{{route('internquest/')}}">
                                    <ion-icon name="home"></ion-icon>
                                    Accueil</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                        Offres</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black"><a href="{{route('companies.index')}}">
                                    <ion-icon name="business"></ion-icon>
                                    Entreprises</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    <ion-icon name="person"></ion-icon>
                                    <a href="{{route('users.list')}}">Utilisateurs</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    <ion-icon name="school"></ion-icon>
                                    <a href="{{route('promos.index')}}">Promotions</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="archive"></ion-icon>
                                    <a href="{{route('applications.show', Auth::user()->id)}}" class="py-5 px-3 hover:text-black">Mes candidatures</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    <a href="{{ route('companies.list') }}">
                                        <ion-icon name="chatbubble-ellipses"></ion-icon>
                                        Mes activités
                                    </a>                                    
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    @if ($count > 0)
                                        <a href="{{route('internquest.admin.notifications')}}"><ion-icon name="mail-unread"></ion-icon>Notifications</a>
                                    @else
                                        <ion-icon name="mail"></ion-icon>Notifications
                                    @endif
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    <ion-icon name="person-circle"></ion-icon>
                                    <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                                </div>
                                <form action="{{route('auth.logout')}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="py-3 px-1 hover:text-black">
                                        <ion-icon name="log-out"></ion-icon>
                                        <button>Se deconnecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        @endif

        @if (Auth::user()->role == 'Pilote')
        <nav class="bg-gray-100" id ="nav_admin">
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
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="school"></ion-icon>
                                <a href="{{route('promos.index')}}" class="py-5 px-3 hover:text-black">Promotions</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <ion-icon name="mail-unread"></ion-icon>Notifications
                                <a href="{{route('internquest.admin.notifications')}}"><ion-icon name="mail"></ion-icon>Notifications</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{ route('companies.list') }}">
                                    <ion-icon name="chatbubble-ellipses"></ion-icon>
                                    Mes activités
                                </a>                                
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="person-circle"></ion-icon>
                                <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                            </div>
                            <form action="{{route('auth.logout')}}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="log-out"></ion-icon>
                                    <button>Se deconnecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
        @endif

        @if (Auth::user()->role == 'Etudiant')
        <nav class="bg-gray-100" id ="nav_admin">
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
                                <a href="{{route('offers.index')}}"><ion-icon name="briefcase"></ion-icon>
                                    Offres</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black"><a href="{{route('companies.index')}}">
                                <ion-icon name="business"></ion-icon>
                                Entreprises</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="school"></ion-icon>
                                <a href="#" class="py-5 px-3 hover:text-black">Ma promo</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="archive"></ion-icon>
                                <a href="{{route('applications.show', Auth::user()->id)}}" class="py-5 px-3 hover:text-black">Mes candidatures</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="list"></ion-icon>
                                <a href="#" class="py-5 px-3 hover:text-black">Ma wishlist</a>
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{ route('companies.list') }}">
                                    <ion-icon name="chatbubble-ellipses"></ion-icon>
                                    Mes activités
                                </a>                                
                            </div>
                            <div class="py-5 px-3 hover:text-black">
                                <ion-icon name="person-circle"></ion-icon>
                                <a href="{{route('auth.show')}}">{{Auth::user()->username}}</a>
                            </div>
                            <form action="{{route('auth.logout')}}" method="POST">
                                @method('delete')
                                @csrf
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="log-out"></ion-icon>
                                    <button>Se deconnecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
        @endif
    @endauth
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
        <dialog id="signin_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
            <div class="w-full p-10 flex flex-col items-center">
                <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closesignin(), preventReload(event)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
                <h2 class="text-2xl text-blue-600 mb-6">S'inscrire</h2>
                <form action="{{route('internquest.users.store')}}" method="POST" class = w-full>
                    @csrf
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                        <input type="text" name="lname" id="lname" required placeholder="Last Name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @error('lname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Prénom</label>
                        <input type="text" name="fname" id="fname" required placeholder="First name" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @error('fname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="relative mb-6">
                        <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mail</label>
                        <input type="email" name="mail" id="mail" required placeholder="email@example.fr" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('mail')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                        <input type="password" name="password" id="password" required placeholder="password" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('password')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Pseudo</label>
                        <input type="text" name="username" id="username" required placeholder="Identifiant" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <span>
                            @error('username')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
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
                            @error('role')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                        </span>
                    </div>
                    <div class="relative mb-6">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Centre</label>
                        <input type="text" name="centre" id="centre" required placeholder="Centre" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @error('centre')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
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
        <dialog id="login_dialog" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
            <div class="w-full p-10 flex flex-col items-center">
                <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closelogin(), preventReload(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-4xl text-blue-600 mb-6">Se connecter</h2>
                <form action="{{route('auth.login')}}" class="w-full" method="POST">
                    @csrf
                    <div class="relative mb-6">
                        <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <input type="email" name="mail" id="mail" required placeholder="" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mail</label>
                        @error('mail')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="relative mb-6">
                        <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                        <input type="password" name="password" id="password" required placeholder="" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                        @error('password')
                            <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <label class="flex items-center text-base text-gray-700 font-medium">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">Se rappeler de moi
                        </label>
                        <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
                    </div>
                    <div>
                        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Se connecter</button>
                    </div>
                    <div class="text-center text-sm text-gray-700 mt-4">
                        J'ai déja un compte. <a href="{{route('auth.login')}}" class="font-bold hover:underline"> se connecter</a>
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
<script>
    // Sélection des éléments du formulaire
    const mailInput = document.getElementById("mail");
    const passwordInput = document.getElementById("password");
    const usernameInput = document.getElementById("username");

    // Ajout d'un event listener à chaque champ d'entrée
    mailInput.addEventListener('input', validateInput);
    passwordInput.addEventListener('input', validateInput);
    usernameInput.addEventListener('input', validateInput);

    // Fonction de validation
    function validateInput(event) {
        const input = event.target;
        const value = input.value.trim(); // Supprimer les espaces vides au début et à la fin

        // Vérification du type demandé pour chaque champ
        switch (input.id) {
            case 'username':
                // Aucune vérification spécifique pour les champs de texte
                break;
            case 'mail':
                // Vérification de l'email
                if (!isValidEmail(value)) {
                    input.setCustomValidity('Veuillez entrer une adresse email valide');
                } else {
                    input.setCustomValidity('');
                }
                break;
            case 'password':
                // Vérification de la longueur minimale du mot de passe
                if (value.length < 8) {
                    input.setCustomValidity('Le mot de passe doit comporter au moins 8 caractères');
                } else {
                    input.setCustomValidity('');
                }
                break;
            default:
                break;
        }
    }

    // Fonction pour valider un email
    function isValidEmail(email) {
        // Expression régulière pour valider l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    document.getElementById("centre").addEventListener("input", function() {
            this.value = this.value.toUpperCase();
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>