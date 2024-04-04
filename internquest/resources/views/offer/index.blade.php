
@extends('accueil')

@section('title', 'Offres')

@section('content')

<div class="flex justify-center">
    <div class="w-full max-w-4xl">
        @auth
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
                <a href="{{route('offers.create')}}">
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium flex justify-center items-center gap-2">
                        <ion-icon name="add-outline"></ion-icon>Publier
                    </button>
                </a>
            @endif
        @endauth

        <div class="flex flex-col w-full">
            @foreach ($offers as $offer)
                <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                    <strong><h1 class="text-xl font-bold">{{$offer->title}}</h1></strong>
                    <p class="text-gray-900 text-lg font-semibold">Localité: {{$offer->city}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Durée: {{$offer->duration}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Date de début: {{$offer->date_offer}}</p>
                    <p class="text-gray-900 text-lg font-semibold">Nombre de places: {{$offer->place_offered}}</p>
                    <p style=" text-gray-900 text-lg">{{$offer->nb_application}} personnes ont postulé à cette offre</p>
                    <div class="mt-4">
                        <form action="{{route('offers.show', $offer->id)}}" method="GET" class="flex justify-between">
                            @csrf
                            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">En savoir plus...</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection