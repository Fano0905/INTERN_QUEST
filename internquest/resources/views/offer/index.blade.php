@extends('layout')

@section('title', 'Rechercher des offres')

@section('content')
<div class="flex justify-center">
    <form action="{{ route('offers.search') }}" method="GET" class="space-y-4">
        <div class="flex space-x-2">
            <input type="search" name="skills" placeholder="Compétences" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
            <input type="search" name="city" placeholder="Localité" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
            <input type="search" name="company" placeholder="Entreprise" class="bg-white h-10 px-5 rounded text-sm focus:outline-none">
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">
            Rechercher
        </button>
    </form>
</div>
    @foreach ($offers as $offer)
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            <strong><h2 class="text-xl font-bold">{{$offer->title}}</h2></strong>
            <div class="text-gray-900 text-lg font-semibold">
                @if (Auth::user()->wish->contains($offer->id))
                    <form action="{{route('wishlist.supp.wl', $offer->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
            <p class="text-gray-900 text-lg font-semibold">Nombre d'élèves ayant postulé: {{$offer->applications->count()}}</p>
            <p class="text-gray-900 text-lg font-semibold">Note de l'Entreprise: {{$offer->entreprise->evaluation}}</p>
            <div class="mt-4">
                <form action="{{route('offers.show', $offer->id)}}" method="GET" class="flex justify-between">
                    @csrf
                    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Consulter</button>
                </form>
            </div>
        </div>
    @endforeach
    <div class="mt-4">
        {{ $offers->links() }}
    </div>
</div>
@endsection
