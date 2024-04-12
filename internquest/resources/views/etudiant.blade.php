<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Page étudiant</title>
</head>
<body style="height: 200dvh">
    <div class="w-full h-full bg-no-repeat bg-cover overflow-auto" style="background-image: url('/img/image-bg.jpg')">
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
    </div>
</body>
</html>