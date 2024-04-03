@extends('base')

@section('title', $offer->title)

@section('content')
    <p>Localité: {{$offer->city}}</p>
    <p>Promos concernées: 
    <p>Durée: {{$offer->duration}}</p>
    <p>Rémuneration: {{$offer->remuneration}}</p>
    <p>Date de début: {{$offer->date_offer}}</p>
    <p>Nombre de places: {{$offer->place_offered}}</p>
    <p>Offre proposée par: {{$offer->entreprise->name}}</p>
    <p><strong>Description</strong><br>
    <textarea rows="20" cols="100">{{$offer->description}}</textarea>

    @auth
        <div class="control">
            <a href="{{route('offers.edit', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier l'offre</button></a>
            <form action="{{ route('offers.destroy', $offer->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer l'offre</button>
            </form>
        </div>
        <a href="{{route('applications.create', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button></a>
    @endauth

@endsection