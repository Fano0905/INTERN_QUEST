@extends('accueil')

@section('title', 'Entreprises')

@section('content')

@auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
        <a href="{{route('companies.create')}}"><ion-icon name="add-outline" style="background-color: gray"></ion-icon></a>
    @endif
@endauth

<div class="max-w-7xl mx-auto px-4">
    @foreach ($companies as $company)
        <p>Nom {{$company->name}}</p>
        <p>Secteur {{$company->area}}</p>
        <p>Vous pouvez nous trouver sur {{$company->website}}</p>
        <form action="{{route('companies.show', $company->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">En savoir plus</button>
        </form>
    @endforeach
</div>
@endsection()