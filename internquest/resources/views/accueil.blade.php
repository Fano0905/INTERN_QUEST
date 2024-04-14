<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="manifest" href="/manifest.json">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
  <title>@yield('title', 'Accueil')</title>
</head>


<body style="height: 200dvh">
<div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">
    @auth
    <nav class="bg-gray-100" id="nav_admin">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="flex space-x-4 md:space-x-8">
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('internquest')}}">
                            <ion-icon name="home"></ion-icon>
                            Accueil
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('offers.index')}}">
                            <ion-icon name="briefcase"></ion-icon>
                            Offres
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('companies.index')}}">
                            <ion-icon name="business"></ion-icon>
                            Entreprises
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('accueil.users.list')}}">
                            <ion-icon name="person"></ion-icon>
                            Utilisateurs
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('promos.index')}}">
                            <ion-icon name="school"></ion-icon>
                            Promotions
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('wishlist.show')}}">
                            <ion-icon name="bookmark"></ion-icon>
                            Wishlist
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('applications.show', Auth::user()->id)}}" class="hover:text-black">
                            <ion-icon name="archive"></ion-icon>
                            Mes candidatures
                        </a>
                    </div>
                    <div class="py-3 px-1 hover:text-black">
                        @if ($count > 0)
                            <a href="{{route('internquest.admin.notifications')}}">
                                <ion-icon name="mail-unread"></ion-icon>
                                Notifications
                            </a>
                        @else
                            <ion-icon name="mail"></ion-icon>
                            Notifications
                        @endif
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="py-3 px-1 hover:text-black">
                        <a href="{{route('auth.show')}}">
                            <ion-icon name="person-circle"></ion-icon>
                            {{Auth::user()->username}}
                        </a>
                    </div>
                    <form action="{{route('auth.logout')}}" method="POST" class="py-3 px-1 hover:text-black">
                        @method('delete')
                        @csrf
                        <button>
                            <ion-icon name="log-out"></ion-icon>
                            Se deconnecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>    
    @endauth
    @guest
        <nav class="bg-gray-100" id ="nav_guest">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('internquest')}}">
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

    <div class="flex flex-wrap">
        <div class="w-1/2">
            @foreach ($companies as $company)
                <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <div class="p-4 border-b">
                        <h2 class="text-xl font-bold">{{ $company->name }}</h2>
                        <p>Secteur: {{ $company->area }}</p>
                        <p>Vous pouvez nous retrouver sur {{ $company->website }}</p>
                        <p class="text-gray-900 text-lg font-semibold">Note: <span class="stars" data-evaluation="{{$company->evaluation}}"></span></p>
                        <div class="mt-4">
                            <a href="{{route('companies.show', $company->id)}}">
                                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $companies->links() }}
            </div>
        </div>
        
        <div class="w-1/2">
            @foreach ($companies as $company)
                <div class="p-4 border-b">
                    <h2 class="text-xl font-bold">Offres de {{ $company->name }}</h2>
                    <select class="w-full p-2 border rounded">
                        @foreach ($company->offers as $offer)
                            <option onclick="{{route('offers.show', $offer->id)}}" value="{{ $offer->id }}">{{ $offer->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $companies->links() }}
            </div>
            @auth
                @foreach($promos as $promo)
                    <div class="flex flex-col w-full">
                        <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                            <strong><h2 class="text-xl font-bold">{{$promo->name}}</h2></strong>
                            <div class="mt-4">
                                <a href="{{route('promos.show', $promo->id)}}">
                                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Consulter</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endauth
        </div>
    </div>

    <strong><h2 style="color: white">Entreprises sous ma responsabilité</h2></strong>

    @auth
        @foreach($mycompany as $company)
            <div class="flex flex-col w-full">
                <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <strong><h2 class="text-xl font-bold">{{$company->name}}</h2></strong>
                    <p class="text-gray-900 text-lg font-semibold">Secteur {{$company->area}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Vous pouvez nous retrouver sur {{$company->website}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Note: <span class="stars" data-evaluation="{{$company->evaluation}}"></span></p>
                    <div class="mt-4">
                        <a href="{{route('companies.show', $company->id)}}">
                            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
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
    </div>
    <dialog id="signin_dialog" class="fixed inset-0 m-auto w-full max-w-lg h-auto bg-white border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex flex-col items-center justify-center overflow-hidden p-6" style="backdrop-filter: blur(20px); display: none;" open>
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
        <dialog id="login_dialog" class="fixed inset-0 m-auto w-full max-w-lg h-auto bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex flex-col items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
             <div class="w-full p-6 flex flex-col items-center">
                <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="closelogin(), preventReload(event)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h2 class="text-2xl sm:text-3xl md:text-4xl text-blue-600 mb-6">Se connecter</h2>
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
                            <input type="checkbox" id="remember_me" class="form-checkbox h-5 w-5 text-blue-600 mr-2">Se rappeler de moi
                        </label>
                        <a href="#" class="text-sm text-gray-700 hover:underline mx-3">Politique de confidentialité</a>
                    </div>
                    <div>
                        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Se connecter</button>
                    </div>
                    <div class="text-center text-sm text-gray-700 mt-4">
                        J'e n'ai pas de compte. <a href="#" onclick="signin(), preventReload(event)" class="font-bold hover:underline"> S'inscrire</a>
                    </div> 
                </form>
            </div>
        </dialog>
@yield('content')
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
    
    const mailInput = document.getElementById("mail");
    const passwordInput = document.getElementById("password");
    const usernameInput = document.getElementById("username");

    
    mailInput.addEventListener('input', validateInput);
    passwordInput.addEventListener('input', validateInput);
    usernameInput.addEventListener('input', validateInput);

    
    function validateInput(event) {
        const input = event.target;
        const value = input.value.trim(); 

        
        switch (input.id) {
            case 'username':
            
                break;
            case 'mail':
                
                if (!isValidEmail(value)) {
                    input.setCustomValidity('Veuillez entrer une adresse email valide');
                } else {
                    input.setCustomValidity('');
                }
                break;
            case 'password':
                
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

    
    function isValidEmail(email) {
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
</script>
<script>
    var starsContainers = document.querySelectorAll('.stars');
    starsContainers.forEach(function(starContainer) {

      var evaluation = parseInt(starContainer.getAttribute('data-evaluation'));

      if (evaluation == 0) {
            starContainer.innerHTML = 'N/A';
      } else {
            for (var i = 0; i < evaluation; i++) {
            starContainer.innerHTML += '<ion-icon name="star"></ion-icon>';
            }
            for (var j = evaluation; j < 5; j++) {
            starContainer.innerHTML += '<ion-icon name="star-outline"></ion-icon>';
        }
      }
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>