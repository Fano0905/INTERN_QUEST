@extends('accueil')

@section('title', 'Offre')

@section('content')
    <p>Localite: {{$offre->localite}}</p>
    <p>Promo: <strong>{{$offre->type_promo}}</strong></p>
    <p>Duree: {{$offre->duree}}</p>
    <p>Remuneration: {{$offre->remuneration}}</p>
    <p>Date de début: {{$offre->date_offre}}</p>
    <p>Nombre de place: {{$offre->place_offerte}}</p>
    <p>{{$offre->id_entreprises}}</p>
    <p><strong>Description</strong><br>
    <textarea rows="20" cols="100">{{$offre->description}}</textarea>

    @auth
        @if (Auth::user()->role->id == 3)
        <form action="{{route('offres.show', $offre->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button>
        </form>
        @else
            <div class="control">
                <a href="{{route('offres.edit', $offre->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier l'offre</button></a>
                <form action="{{ route('offres.destroy', $offre->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer l'offre</button>
                </form>
            </div>
        @endif
    @endauth

@endsection