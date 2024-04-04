@extends('accueil')

@section('title', 'Entreprises')

@section('content')
<div class="flex justify-center">
<div class="w-full max-w-4xl">
@auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
    <a href="{{route('companies.create')}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><ion-icon name="add-outline"></ion-icon>Créer</button></a>
    @endif
@endauth

<div class="flex flex-col w-full">
    @foreach ($companies as $company)
    <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
    <strong><h1 class="text-xl font-bold">{{$company->name}}</h1><strong>
        <p class="text-gray-900 text-lg font-semibold">Secteur {{$company->area}}</p>
        <p class="text-gray-900 text-lg font-semibold">Vous pouvez nous trouver sur {{$company->website}}</p>
        <div class="mt-4">
        <a href="{{route('companies.show', $company->id)}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
@endsection()