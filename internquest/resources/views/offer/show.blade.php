@extends('accueil')

@section('title', 'Offer')

@section('content')
    <p>Location: {{$offer->location}}</p>
    <p>Class: <strong>{{$offer->type_promo}}</strong></p>
    <p>Duration: {{$offer->duration}}</p>
    <p>Remuneration: {{$offer->remuneration}}</p>
    <p>Starting date: {{$offer->date_offer}}</p>
    <p>Place offered: {{$offer->place_offered}}</p>
    <p>{{$offer->id_company}}</p>
    <p><strong>Description</strong><br>
    <textarea rows="20" cols="100">{{$offer->description}}</textarea>

    @auth
        @if (Auth::user()->role == 'Pilote' || 'Admin')
            <div class="control">
                <a href="{{route('offers.edit', $offer->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Edit Offer</button></a>
                <form action="{{ route('offers.destroy', $offer->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Delete Offer</button>
                </form>
            </div>
        @else
            <form action="{{route('offers.show', $offer->id)}}" method="GET">
                @csrf
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Apply</button>
            </form>
        @endif
    @endauth

@endsection