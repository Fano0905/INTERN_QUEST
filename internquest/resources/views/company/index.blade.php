@extends('accueil')

@section('title', 'Entreprises')

@section('content')

@auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
    <a href="{{route('companies.create')}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><ion-icon name="add-outline"></ion-icon>Créer</button></a>
    @endif
@endauth

@foreach ($companies as $company)
    <div class="localite bg-gray-100 p-4 border border-gray-300 rounded-md" style="list-style-type:none;">
        <p>Nom {{$company->name}}</p>
        <p>Secteur {{$company->area}}</p>
        <p>Vous pouvez nous trouver sur {{$company->website}}</p>
        <a href="{{route('companies.show', $company->id)}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus</button>
    </div>
@endforeach
@endsection()