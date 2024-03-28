@extends('accueil')

@section('title', 'Offres')

@section('content')

    @auth
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')
        <a href="{{route('offers.create')}}"><ion-icon name="add-outline" style="background-color: blue"></ion-icon></a>
    @endif
    @endauth
    @foreach ($offers as $offer)
        <strong><h1>{{$offer->title}}</h1></strong>
        <p>Location: {{$offer->location}}</p>
        <p>Duration: {{$offer->duration}}</p>
        <p>Starting date: {{$offer->date_offer}}</p>
        <p>Place offered: {{$offer->place_offered}}</p>
        <form action="{{route('offers.show', $offer->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Learn more...</button>
        </form>
    @endforeach
@endsection()