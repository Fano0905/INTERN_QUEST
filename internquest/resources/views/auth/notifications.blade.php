@extends('accueil')

@section('title', 'Page Admin')

@section('content')
    <table style="border: 10px, black; border:solid">
        <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Role</th>
                <th>Approuver</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pending_users as $user): ?>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->lname}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->role}}</td>
                    <td><a href="{{route('internquest.users.approve', $user->id)}}"  class="text-gray-500 hidden md:flex space-x-16"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Approuver la demande</button></a></td>
                    <td><a href="{{route('internquest.users.disapprove', $user->id)}}"  class="text-gray-500 hidden md:flex space-x-16"><button class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Rejeter la demande</button></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
@endsection