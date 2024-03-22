<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Accueil')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<nav class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center">
            <div class="flex ">   
                <div class="text-gray-700 hidden md:flex space-x-16">
                    <a href="#" class="py-5 px-3 hover:text-black">Accueil</a>
                    <a href="#" class="py-5 px-3 hover:text-black">Offres</a>
                    <a href="#" class="py-5 px-3 hover:text-black">Notifications</a>   
                    <a href="#" class="py-5 px-3 hover:text-black">Pour les entreprises</a>
                    <a href="#" class="py-5 px-3 hover:text-black">Publier</a>
                    @auth
                    <a href="{{route('auth.show')}}" class="py-5 px-3 hover:text-black">{{Auth::user()->username}}</a>
                    <form action="{{route('auth.logout')}}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="py-5 px-3 hover:text-black">Se déconnecter</button>
                    </form>
                    @endauth
                    @guest
                        <div class="text-gray-700 hidden md:flex space-x-16">
                            <a href="{{route('auth.login')}}" class="py-2 px-3 bg-gray-200 text-gray-700 rounded-3xl hover:bg-gray-300 transition duration-300"> se connecter
                            <a href="{{route('users.create')}}" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">S'inscrire</a>
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
</body>
</html>