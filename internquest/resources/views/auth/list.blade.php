@extends('layout')

@section('content')
<div class="flex justify-center items-center h-screen"> 
    <div class="flex flex-col justify-center items-center">
        <div class="flex justify-center">
            <form action="{{ route('internquest.users.search') }}" method="GET" class="space-y-4">
                <div class="mt-12 mb-2 flex space-x-2">
                    <input type="search" name="lname" placeholder="Nom" class="bg-white h-9 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="fname" placeholder="Prénom" class="bg-white h-9 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="center" placeholder="Centre" class="bg-white h-9 px-5 rounded text-sm focus:outline-none">
                    <input type="search" name="promotion" placeholder="Promotion" class="bg-white h-9 px-5 rounded text-sm focus:outline-none">
                    <select name="role" class="bg-white h-9 px-5 rounded text-sm focus:outline-none">
                        <option value="">Sélectionner un rôle</option>
                        <option value="pilote">Pilote</option>
                        <option value="eleve">Etudiant</option>
                    </select>
                    <button type="submit" class="w-40 h-9 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
        <div class="rounded-3xl overflow-hidden bg-gray-300 p-6 mt-3" style="max-width: 95vw; max-height: 90vh; overflow-y: auto;"> 
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
                                <button class="w-11 h-11 bg-blue-800 text-gray-200 rounded-lg hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><svg style="display: block; margin: auto;" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64" fill="currentColor"/><path fill="currentColor" d="M490.84 238.6c-26.46-40.92-60.79-75.68-99.27-100.53C349 110.55 302 96 255.66 96c-42.52 0-84.33 12.15-124.27 36.11c-40.73 24.43-77.63 60.12-109.68 106.07a31.92 31.92 0 0 0-.64 35.54c26.41 41.33 60.4 76.14 98.28 100.65C162 402 207.9 416 255.66 416c46.71 0 93.81-14.43 136.2-41.72c38.46-24.77 72.72-59.66 99.08-100.92a32.2 32.2 0 0 0-.1-34.76M256 352a96 96 0 1 1 96-96a96.11 96.11 0 0 1-96 96"/></svg>
                                </button> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="#" onclick="signin(); preventReload(event)" class="text-black hidden md:flex absolute top-0 right-0 mt-4 mr-4"> 
        <button class="w-16 h-16 mt-28 bg-black text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-black-400 font-medium">
            <ion-icon name="add"></ion-icon> 
        </button>
    </a>
</div>
@endsection
