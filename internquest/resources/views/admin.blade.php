<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Accueil')</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="w-full h-screen bg-no-repeat bg-cover" style="background-image: url('/img/image-bg.jpg')">

<nav class="bg-gray-100" id ="nav_bar">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-center">
            <div class="flex ">   
                <div class="text-gray-700 hidden md:flex space-x-16">
                    <div class="py-5 px-3 hover:text-black">
                        <a href=""><ion-icon name="person-outline"></ion-icon>Utilisateurs</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href=""><ion-icon name="business"></ion-icon>Entreprises</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href=""><ion-icon name="briefcase"></ion-icon>Offres</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href="{{route('areas.index')}}"><ion-icon name="business"></ion-icon>Secteurs</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href=""><ion-icon name="business"></ion-icon>Entreprises</a>
                    </div>
                    <div class="py-5 px-3 hover:text-black">
                        <a href=""><ion-icon name="business"></ion-icon>Entreprises</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>