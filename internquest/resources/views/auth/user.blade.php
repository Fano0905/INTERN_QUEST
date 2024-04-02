<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Accueil')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body style="height: 200dvh">
    <div class="w-full h-full bg-no-repeat bg-cover overflow-hidden" style="background-image: url('/img/image-bg.jpg'); background-position: left bottom;">
        <div class="flex justify-center items-center h-screen">
            <div class="w-192 h-128 border border-black bg-gray-200 rounded-3xl flex">
                <div class="w-3/4 p-4">
                    <p class="text-lg text-black-700 font-medium transition-all">Nom : {{$user->lname}}</p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"></div>
                    <p class="text-lg text-black-700 font-medium transition-all">Prénom : {{$user->fname}}</p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"></div>
                    <p class="text-lg text-black-700 font-medium transition-all">Rôle : {{$user->mail}}</p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"></div>
                    <p class="text-lg text-black-700 font-medium transition-all">Mail : {{$user->role}}</p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"></div>
                </div>
                <div class="w-1/4 p-4 border photo-container flex items-center justify-center">
                    <img src="img/pdp.png" alt="photo de profil utilisateur" class="w-3/4 h-3/4">
                </div>
            </div>
            <div class="control flex justify-center items-center mt-4">
                <a href="{{route('users.edit', $user->id)}}" class="mx-2">
                    <button type="submit" class="w-36 h-12 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
                        Modifier
                    </button>
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-36 h-12 bg-red-600 text-white rounded-lg hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>