<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil de {{$user->username}}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body style="h-dvh">
<div class="w-full h-full bg-no-repeat bg-cover " style="background-image: url('/img/image-bg.jpg'); background-position: left bottom;">
    <div class="flex justify-center items-center h-screen">
        <div class="border border-black bg-gray-200 rounded-3xl" style="width: 768px; height: 350px;">              <div class="flex">
                <div class="w-1/4 p-4 border photo-container mt-4 ml-2">
                    <img src="img/pdp.jpg" alt="photo de profil utilisateur" class="w-100 h-100">
                </div>

                <div class="w-3/4 p-4 mt-8">

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Nom : {{ $user->lname }}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>
                    
                    <p class="text-lg text-black-700 font-medium transition-all">
                        Prénom : {{$user->fname}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Rôle : {{$user->role}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>

                    <p class="text-lg text-black-700 font-medium transition-all">
                        Mail : {{$user->mail}}
                    </p>
                    <div class="block w-full h-0.5 bg-blue-500 bottom-0 left-0"> </div>

                </div>
            </div>

            <div class="control flex justify-center items-center mt-16">
                <a href="{{route('internquest.users.edit', $user->id)}}" class="mx-2">
                <button type="submit" class="w-48 h-12 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium mr-4"> 
                    Modifier
                </button>
                </a>

                <form action="{{ route('internquest.users.destroy', $user->id) }}" method="post">
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
</body>
</html>