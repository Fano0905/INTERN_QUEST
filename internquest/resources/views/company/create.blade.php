<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Création entreprise</title>
</head>
<body>

    @if ($errors->any()) {
        <div>
            <div style="font-style: italic; color:red;">Something went wrong</div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    }
    @endif
    <form action="{{route('companies.store')}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Name</label>
            <input type="text" name="name" id="name" required placeholder="Nom" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('name')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">Area</label>
            <select name="area" id="area">
                @foreach ($areas as $area)
                    <option value="{{$area->name}}">{{$area->name}}</option>
                @endforeach
            </select>
            @error('area')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Website</label>
            <input type="text" name="site" id="site" required placeholder="site@example.fr" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('site')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Location</label>
            <input type="text" name="location" id="location" required placeholder="location" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('location')
                <p style="color: red;">{{$message}}</p>
                @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Assigned Pilot</label>
            <select name="pilot" id="pilot" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @foreach ($pilotes as $pilote)
                    @if ($pilote->role == 'Pilote' || $pilote->role == 'Admin')
                        <option>{{$pilote->id}}</option>
                    @endif
                @endforeach
            </select>
            @error('id_pilot')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">S'enregistrer</button>
        </div>
    </form>
</body>
</html>