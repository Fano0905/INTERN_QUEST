<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon profil</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body style="height: 200dvh">
<div class="w-full h-full bg-no-repeat bg-cover overflow-hidden" style="background-image: url('/img/image-bg.jpg'); background-position: left bottom;">
    <nav class="bg-gray-100" id ="nav_admin">
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
    <div class="flex justify-end"> 
        <a href="{{route('internquest.users.stats', Auth::user()->id)}}"><button type="submit" class="h-14 w-14 bg-black text-white rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-black-400 font-medium mt-2 mr-2"><ion-icon name="bar-chart"></ion-icon></button></a>
    </div>
    <div class="flex justify-center items-center h-screen">
        <div class="border border-black bg-gray-200 rounded-3xl" style="width: 900px; height: 400px;">              <div class="flex">
                <div class="w-1/4 p-4 border photo-container mt-8 ml-3">
                    <img src="img/pdp.jpg" alt="photo de profil utilisateur" class="w-100 h-100">
                </div>
                <div class="w-3/4 p-4 mt-8">

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Nom : {{ Auth::user()->lname }}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>
                    
                    <p class="text-lg text-black-700 font-medium transition-all">
                        Prénom : {{Auth::user()->fname}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Rôle : {{Auth::user()->role}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Mail : {{Auth::user()->mail}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
                        <p class="text-lg text-black-700 font-medium transition-all">
                            Promo : 
                            @foreach (Auth::user()->promotion as $promo)
                                {{ $promo->name }}
                            @endforeach
                        </p>                    
                        <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>
                    @endif
                    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Etudiant')
                    <p class="text-lg text-black-700 font-medium transition-all">
                        Classe : 
                        @foreach (Auth::user()->promos as $promo)
                            {{ $promo->name }}
                        @endforeach
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>
                @endif                
                </div>
            </div>
            <div class="control flex justify-center items-center mt-16">
                <a href="{{route('internquest.users.edit', Auth::user()->id)}}" class="mx-2">
                <button type="submit" class="w-48 h-12 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium mr-4"> 
                    Modifier
                </button>
                </a>
                <a href="{{route('internquest.users.learn')}}" class="mx-2">
                    <button type="submit" class="w-48 h-12 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium mr-4"> 
                        Ajouter compétences
                    </button>
                </a>
                <form action="{{ route('internquest.users.destroy', Auth::user()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-48 h-12 bg-black text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium ml-4">
                        Supprimer le compte
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
