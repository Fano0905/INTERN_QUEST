@extends('accueil')

@section('title', 'Entreprises')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    @foreach ($entreprises as $entreprise)
        <p>Nom {{$entreprise->nom}}</p>
        <p>Secteur {{$entreprise->secteur}}</p>
        <p>Localite {{$entreprise->localite}}</p>
        <p>Pilote Assigné {{$entreprise?->id_pilote}}</p>
        <p>Site {{$entreprise->site}}</p>
        <p>Evaluation {{$entreprise->evaluation}}</p>
        <form action="{{route('entreprises.show', $entreprise->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Plus d'info</button>
        </form>
    @endforeach
</div>
@endsection()