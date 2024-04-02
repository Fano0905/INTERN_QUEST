@extends('accueil')

@section('title', 'Offres')

@section('content')

    @auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
        <a href="{{route('offers.create')}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium"><ion-icon name="add-outline"></ion-icon>Publier</button></a>
    @endif
    @endauth
    @foreach ($offers as $offer)
        <strong><h1>{{$offer->title}}</h1></strong>
        <p>Localité: {{$offer->city}}</p>
        <p>Durée: {{$offer->duration}}</p>
        <p>Date de début: {{$offer->date_offer}}</p>
        <p>Nombre de places: {{$offer->place_offered}}</p>
        <form action="{{route('offers.show', $offer->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus...</button>
        </form>
    @endforeach
@endsection()