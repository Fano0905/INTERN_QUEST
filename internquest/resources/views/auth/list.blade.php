@extends('accueil')

@section('content')
<div class="flex justify-center items-center h-screen"> 
    <div class="flex flex-col justify-center items-center"> 
        <div class="rounded-3xl overflow-hidden bg-gray-300 p-6" style="max-width: 95vw; max-height: 90vh; overflow-y: auto;"> 
            <table class="border-collapse border-black">
                <thead class="mb-4">
                    <tr>
                        <th class="w-1/12">ID</th>
                        <th class="w-1/4">Last Name</th> 
                        <th class="w-1/4">First Name</th>
                        <th class="w-1/4">Role</th>
                        <th class="w-1/4">Voir</th> 
                    </tr>
                </thead>
                <tbody class="mt-8"> 
                    @foreach ($users as $user)
                    <tr class="divide-y divide-blue-500 my-4"> 
                        <td class="py-2">{{$user->id}}</td> 
                        <td class="py-2">{{$user->lname}}</td>
                        <td class="py-2">{{$user->fname}}</td>
                        <td class="py-2">{{$user->role}}</td>
                        <td>
                            <a href="{{route('internquest.users.show', $user->id)}}" class="text-black hidden md:flex space-x-16 ml-8">
                                <button class="w-11 h-11 bg-blue-800 text-gray-200 rounded-lg hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">+</button> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="#" onclick="signin(); preventReload(event)" class="text-black hidden md:flex absolute top-0 right-0 mt-4 mr-4"> 
        <button class="w-16 h-16 mt-24 bg-black text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-black-400 font-medium">
            <ion-icon name="add"></ion-icon> 
        </button>
    </a>
</div>
@endsection