<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Modidier Informations</title>
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
    <form action="{{route('users.update', Auth::user()->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">LName</label>
            <input type="text" name="lname" id="lname" required value="{{Auth::user()->lname}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('lname')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">FName</label>
            <input type="text" name="fname" id="fname" required value="{{Auth::user()->fname}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('fname')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mail</label>
            <input type="mail" name="mail" id="mail" required value="{{Auth::user()->mail}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('mail')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Password</label>
            <input type="password" name="password" id="password" required placeholder="password" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            <span>
                @error('password')
                <p style="color: red;">{{$message}}</p>
                @enderror
            </span>
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Username</label>
            <input type="text" name="username" id="username" required value="{{Auth::user()->username}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('username')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Role</label>
            <select name="role" id="role" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <option value="Admin">Admin</option>
                <option value="Pilote">Pilote</option>
                <option value="Etudiant">Etudiant</option>
            </select>
            @error('role')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div>
            <<button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Edit</button>
        </div>
    </form>
</body>
</html>