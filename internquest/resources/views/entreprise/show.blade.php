@extends('accueil')

@section('title', $entreprise->nom)

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <p>Secteur : {{$entreprise->secteur}}</p>
    <p>Localite : {{$entreprise->localite}}</p>
    <p>Pilote Assigné : {{$entreprise?->id_pilote}}</p>
    <p>Site : {{$entreprise->site}}</p>
    <p>Evaluation {{$entreprise->evaluation}}</p>
    <div class="control">
        <a href="{{route('entreprises.edit', $entreprise->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
        <form action="{{ route('entreprises.destroy', $entreprise->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer Entreprise</button>
        </form>
        <a href="{{route('entreprises.evaluate', $entreprise->id)}}"><button class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Evaluer</button></a>
    </div>
</div>
@endsection()