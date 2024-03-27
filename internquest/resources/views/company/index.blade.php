@extends('accueil')

@section('title', 'Entreprises')

@section('content')

@auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
        <a href="{{route('companies.create')}}"><ion-icon name="add-outline" style="background-color: blue"></ion-icon></a>
    @endif
@endauth

<div class="max-w-7xl mx-auto px-4">
    @foreach ($companies as $company)
        <p>Nom {{$company->nom}}</p>
        <p>Secteur {{$company->secteur}}</p>
        <p>Localite {{$company->localite}}</p>
        <p>Pilote Assigné {{$company->pilote}}</p>
        <p>Site {{$company->site}}</p>
        <p>Evaluation {{$company->evaluation}}</p>
        <form action="{{route('companies.show', $company->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Plus d'info</button>
        </form>
    @endforeach
</div>
@endsection()