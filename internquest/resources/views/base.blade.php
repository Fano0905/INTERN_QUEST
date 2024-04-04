<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Vue de base')</title>
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
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('internquest')}}">
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
                            <div class="text-gray-700 items-center hidden md:flex space-x-8">
                                <a href="#" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300" onclick="login(), preventReload(event)" >Se connecter</a>
                                <div class="py-5 px-3 hover:text-black">
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
                                <div class="py-5 px-3 hover:text-black">
                                    <a href="{{route('internquest')}}">
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
                                    <ion-icon name="person"></ion-icon>
                                    <a href="{{route('users.list')}}" class="py-5 px-3 hover:text-black">utilisateurs</a>
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="school"></ion-icon>
                                    <a href="{{route('promos.index')}}" class="py-5 px-3 hover:text-black">Promotions</a>
                                </div>
                                <div class="py-3 px-1 hover:text-black">
                                    @if ($count > 0)
                                        <a href="{{route('internquest.admin.notifications')}}"><ion-icon name="mail-unread"></ion-icon>Notifications</a>
                                    @else
                                        <ion-icon name="mail"></ion-icon>Notifications
                                    @endif
                                </div>
                                <div class="py-5 px-3 hover:text-black">
                                    <ion-icon name="archive"></ion-icon>
                                    <a href="{{route('applications.show', Auth::user()->id)}}" class="py-5 px-3 hover:text-black">Mes candidatures</a>
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

        @if (Auth::user()->role == 'Pilote')
        <nav class="bg-gray-100" id ="nav_admin">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex ">   
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <div class="py-5 px-3 hover:text-black">
                                <a href="{{route('internquest')}}">
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
                                @if ($count > 0)
                                    <a href="{{route('internquest.admin.notifications')}}"><ion-icon name="mail-unread"></ion-icon>Notifications</a>
                                @else
                                    <ion-icon name="mail"></ion-icon>Notifications
                                @endif
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
        @if ($errors->any()) {
            <div>
                <div style="font-style: italic; color:red;">Erreur</div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        }
        @endif
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>