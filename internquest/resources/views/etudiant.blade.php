<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>@yield('title', 'Page Etudiant')</title>
</head>
<body style="height: 200dvh">
    <div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">
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
                            <div class="py-3 px-1 hover:text-black"><a href="{{route('wishlist.show')}}">
                                <ion-icon name="bookmark"></ion-icon>
                                Wishlist</a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <ion-icon name="archive"></ion-icon>
                                <a href="{{route('applications.show', Auth::user()->id)}}" class="hover:text-black">Mes candidatures</a>
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
        <div class="flex justify-center">
            <form action="{{ route('internquest.users.search') }}" method="GET" class="space-y-4">
                <div class="flex space-x-2">
                    <input type="search" name="lname" placeholder="Nom" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="fname" placeholder="Prénom" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="center" placeholder="Centre" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="promotion" placeholder="Promotion" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
                    <select name="role" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
                        <option value="">Sélectionner un rôle</option>
                        <option value="pilote">Pilote</option>
                        <option value="etudiant">Etudiant</option>
                    </select>
                </div>
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
                    Rechercher
                </button>
            </form>    
        </div>
        @yield('content')
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>