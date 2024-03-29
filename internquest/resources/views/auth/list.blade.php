@extends('accueil')

@section('content')
<table style="border: 10px, black; border:solid">
    <thead>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->lname}}</td>
                <td>{{$user->fname}}</td>
                <td>{{$user->mail}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->role}}</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="#" onclick="signin(), preventReload(event)" class="text-gray-700 hidden md:flex space-x-16"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><ion-icon name="add"></ion-icon>Ajouter utilisateur</button></a>
@endsection