@extends('base')

@section('title', $company->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4">
        <p>Nous travaillons dans : {{$company->area}}</p>
        <p>Vous pouvez nous trouver sur {{$company->website}}</p>

        <div class="siege bg-gray-100 p-4 border border-gray-300 rounded-md">
            <h2 class="text-red-500 text-xl font-bold mb-2">A propos de nous</h2>
            <p>Nous siégeons actuellement au </p>
            <ul style="list-style-type: none">
                <li>{{$siege->postal_code}}</li>
                <li>{{$siege->location}}</li>
                <li>{{$siege->city}}</li>
            </ul> 
        </div>
        <div class="localite bg-gray-100 p-4 border border-gray-300 rounded-md">
            <p>Mais vous pouvez aussi nous retrouver aux adresse suivantes</p>
            @foreach ($locations as $location)
                <li>{{$location->location}}</li>
                <li>{{$location->postal_code}}</li>
                <li>{{$location->city}}</li>
            @endforeach
        </div>

        @auth
            @if (Auth::user()->role == 'Admin'|| Auth::user()->role == 'Pilote')
            <div class="control">
                <a href="{{route('companies.edit', $company->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer L'entreprise</button>
                </form>
                <a href="#" onclick="addressing(), preventReload(event)"><button class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Ajouter nouvelle adresse</button></a>
            @endif
                <a href="{{route('companies.evaluate', $company->id)}}"><button class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Noter</button></a>
            </div>
        @endauth
    </div>
    <dialog id="AddAddress" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px); display: none;" open>
        <div class="w-full p-10 flex flex-col items-center">
            <button class="absolute top-0 right-0 mt-4 mr-4 bg-gray-300 text-gray-700 hover:bg-gray-400 rounded-2xl p-2 focus:outline-none" onclick="close_addressing(), preventReload(event)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form action="{{route('companies.address', $company->id)}}" method="POST" enctype>
                @csrf
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Code postal</label>
                    <input type="text" name="postal_code" id="postal_code" required placeholder="Code Postal" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('postal_code')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                    <span class="error-message" id="error-postal_code"></span><br>
                </div>
                <div class="relative mb-6">
                    <label required class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Ville</label>
                    <input type="text" name="cities" id="cities" placeholder="Ville" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    <input type="hidden" name="city" id="city" value="">
                    <select name="select_city" id="select_city" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        <option id="opt"></option>
                    </select>
                    @error('city')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Adresse</label>
                    <input type="text" name="location" id="location" required placeholder="Adresse de l'entreprise" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('location')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Enregistrer Adresse</button>
                </div>
            </form>
        </div>
    </dialog>
@endsection()