<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>User info</title>
</head>
<body>

    @auth
        <img src="" alt="pdp">
        <p>Nom: {{Auth::user()->nom}}</p>
        <p>Prenom: {{Auth::user()->prenom}}</p>
        <p>E-mail: {{Auth::user()->email}}</p>
        <p>Vous êtes connecté en tant que: {{Auth::user()->role->titre}}</p>
        <div class="control" style="display: flex; flex-direction:row;">
            <a href="{{route('users.edit', Auth::user()->id)}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
            <form action="{{ route('users.destroy', Auth::user()->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer compte</button>
            </form>
        </div>
    @endauth
</body>
</html>