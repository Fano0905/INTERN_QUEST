@extends('accueil')

@section('title', 'Offres')

@section('content')
    @foreach ($offres as $offre)
        <p>Localite: {{$offre->localite}}</p>
        <p>Promo: <strong>{{$offre->type_promo}}</strong></p>
        <p>Duree: {{$offre->duree}}</p>
        <p>Remuneration: {{$offre->remuneration}}</p>
        <p>Date de début: {{$offre->date_offre}}</p>
        <p>Nombre de place: {{$offre->place_offerte}}</p>
        <p>{{$offre->id_entreprises}}</p>
        <p><strong>Description</strong><br>
        <textarea rows="20" cols="100">{{$offre->description}}</textarea>
    @endforeach
    <form action="{{route('offres.show', $offre->id)}}" method="GET">
        @csrf
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Plus d'info</button>
    </form>
@endsection()