@extends('etudiant')

@section('title', 'Ma wishlist')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @foreach ($offers as $offer)
            <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                <div class="text-gray-900 text-lg font-semibold">
                    @if (Auth::user()->wish->contains($offer->id))
                        <form action="{{route('wishlist.supp.wl', $offer->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <ion-icon name="bookmark"></ion-icon>
                            </button>
                        </form>
                    @else
                        <form action="{{route('wishlist.add.wl')}}" method="POST">
                            @csrf
                            <input type="hidden" name="offer_id" value="{{$offer->id}}">
                            <button type="submit">
                                <ion-icon name="bookmark-outline"></ion-icon>
                            </button>
                        </form>
                    @endif
                </div>
                <p>Localité: {{$offer->city}}</p>
                <p>Durée: {{$offer->duration}}</p>
                <p>Rémuneration: {{$offer->remuneration}} €</p>
                <p>Date de début: {{$offer->date_offer}}</p>
                <p>Nombre de places: {{$offer->place_offered}}</p>
                <p>Offre postée par: <strong>{{ $offer->entreprise ? $offer->entreprise->name : 'Entreprise inconnue' }}</strong></p>
                <p><strong>Description</strong><br></p>
            </div>
            <textarea rows="20" cols="100" class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">{{$offer->description}}</textarea>
            <a href="{{route('applications.create', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button></a>
        @endforeach
    </div>
@endsection
