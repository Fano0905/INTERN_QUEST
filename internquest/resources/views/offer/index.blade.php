@extends('accueil')

@section('title', 'Offres')

@section('content')

    @auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
        <a href="{{route('offers.create')}}"><ion-icon name="add-outline" style="background-color: blue"></ion-icon></a>
    @endif
    @endauth
    @foreach ($offers as $offer)
        <strong><h1>{{$offer->titre}}</h1></strong>
        <p>Localite: {{$offer->localite}}</p>
        <p>Promo: <strong>{{$offer->type_promo}}</strong></p>
        <p>Duree: {{$offer->duree}}</p>
        <p>Remuneration: {{$offer->remuneration}}</p>
        <p>Date de début: {{$offer->date_offre}}</p>
        <p>Nombre de place: {{$offer->place_offerte}}</p>
        <p>{{$offer->id_entreprises}}</p>
        <p><strong>Description</strong><br>
        <textarea rows="20" cols="100">{{$offer->description}}</textarea>
    @endforeach
    <form action="{{route('offers.show', $offer->id)}}" method="GET">
        @csrf
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Plus d'info</button>
    </form>
@endsection()