<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Page Pilote</title>
</head>
<body style="height: 200dvh">
    <div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">
        <nav class="bg-gray-100" id="nav_pilote">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex">
                        <div class="text-gray-700 hidden md:flex space-x-16">
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
                                <a href="{{route('company.index')}}">
                                    <ion-icon name="business"></ion-icon>
                                    Entreprises
                                </a>
                            </div>
                            <div class="py-3 px-1 hover:text-black">
                                <a href="{{route('promos.index')}}">
                                    <ion-icon name="school"></ion-icon>
                                    Promotions
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
                        <option value="eleve">Etudiant</option>
                    </select>
                </div>
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
                    Rechercher
                </button>
            </form>
        </div>
    </div>
    <strong><h2>Entreprises sous ma responsabilité</h2></strong>
    @auth
        @foreach($mycompany as $company)
            <div class="flex flex-col w-full">
                <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <strong><h2 class="text-xl font-bold">{{$company->name}}</h2></strong>
                    <p class="text-gray-900 text-lg font-semibold">Secteur {{$company->area}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Vous pouvez nous trouver sur {{$company->website}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Note: <span class="stars" data-evaluation="{{$company->evaluation}}"></span></p>
                    <div class="mt-4">
                        <a href="{{route('companies.show', $company->id)}}">
                            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($promos as $promo)
            <div class="flex flex-col w-full">
                <div class="company bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <strong><h2 class="text-xl font-bold">{{$promo->name}}</h2></strong>
                    <div class="mt-4">
                        <a href="{{route('companies.show', $promo->id)}}">
                            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Consulter</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endauth
</body>
</html>