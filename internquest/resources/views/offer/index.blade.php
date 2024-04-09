@extends('accueil')

@section('title', 'Rechercher des offres')

@section('content')
<div class="flex justify-center">
    <form action="{{ route('offers.search') }}" method="GET" class="space-y-4">
        <div class="flex space-x-2">
            <input type="search" name="skills" placeholder="Compétences" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
            <input type="search" name="city" placeholder="Localité" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
            <input type="search" name="company" placeholder="Entreprise" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
            <!-- Ajoutez d'autres champs de recherche ici en fonction des critères. -->
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
            Rechercher
        </button>
    </form>
</div>

<div class="w-full max-w-4xl">
    <!-- ... -->
    <div class="flex flex-col w-full">
        @foreach ($offers as $offer)
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            <strong><h1 class="text-xl font-bold">{{$offer->title}}</h1></strong>
            <!-- ... Affichez d'autres détails de l'offre ici. -->
            <p class="text-gray-900 text-lg font-semibold">Nombre d'élèves ayant postulé: {{$offer->applications->count()}}</p>
            <div class="mt-4">
                <form action="{{route('offers.show', $offer->id)}}" method="GET" class="flex justify-between">
                    @csrf
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus...</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
