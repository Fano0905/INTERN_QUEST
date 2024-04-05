
@extends('accueil')

@section('title', 'Offres')

@section('content')

<div class="flex justify-center">
    <form action="{{ route('companies.search') }}" method="GET">
        <div class="relative text-gray-600">
            <input type="search" name="search" placeholder="Rechercher..." class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27a6.5 6.5 0 0 0 1.48-5.34c-.47-2.78-2.79-5-5.59-5.34a6.505 6.505 0 0 0-7.27 7.27c.34 2.8 2.56 5.12 5.34 5.59a6.5 6.5 0 0 0 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
            </button>
          </div>
    </form>
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