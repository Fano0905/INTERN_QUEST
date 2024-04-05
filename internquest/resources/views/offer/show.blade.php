@extends('accueil')

@section('title', $offer->title)

@section('content')
    <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
        <p>Localité: {{$offer->city}}</p>
        <p>Durée: {{$offer->duration}}</p>
        <p>Rémuneration: {{$offer->remuneration}}</p>
        <p>Date de début: {{$offer->date_offer}}</p>
        <p>Nombre de places: {{$offer->place_offered}}</p>
        <p>Offre proposée par: {{$offer->entreprise->name}}</p>
        <p><strong>Description</strong><br></p>
    </div>
    <textarea rows="20" cols="100">{{$offer->description}}</textarea>

    @auth
        @if (Auth::user()->role == 'Admin'|| Auth::user()->role == 'Pilote')
            <div class="control">
                <a href="{{route('offers.edit', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier l'offre</button></a>
                <a href="{{route('offers.applications', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Voir candidatures</button></a>
                <form action="{{ route('offers.destroy', $offer->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer l'offre</button>
                </form>
            </div>
        @elseif (Auth::user()->role == 'Admin'|| Auth::user()->role == 'Etudiant')
            <a href="{{route('applications.create', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button></a>
        @endif
    @endauth

@endsection