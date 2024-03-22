@extends('accueil')

@section('title', 'Entreprises')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <p>Nom {{$entreprise->nom}}</p>
    <p>Secteur {{$entreprise->secteur}}</p>
    <p>Localite {{$entreprise->localite}}</p>
    <p>Pilote Assigné {{$entreprise?->id_pilote}}</p>
    <p>Site {{$entreprise->site}}</p>
    <p>Evaluation {{$entreprise->evaluation}}</p>
    <div class="control">
        <button onclick="{{route('entreprises.edit', $entreprise->id_entreprise)}}" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button>
        <form action="{{ route('entreprises.destroy', $entreprise->id_entreprise)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer Entreprise</button>
        </form>
    </div>
</div>
@endsection()