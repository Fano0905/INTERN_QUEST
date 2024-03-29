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
        <img src="" alt="pdp" height="50" width="50">
        <p>Last Name: {{Auth::user()->lname}}</p>
        <p>First Name: {{Auth::user()->fname}}</p>
        <p>Mail: {{Auth::user()->email}}</p>
        <p>You are connected as: {{Auth::user()->role}}</p>
        <div class="control" style="display: flex; flex-direction:row;">
            <a href="{{route('users.edit', Auth::user()->id)}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
            <form action="{{ route('users.destroy', Auth::user()->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Delete account</button>
            </form>
        </div>
    @endauth
</body>
</html>