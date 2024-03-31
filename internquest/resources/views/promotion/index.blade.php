@extends('accueil')



@section('content')
    @foreach ($promos as $promo)
        <h2>{{$promo->name}}</h2>
        <p>Pilote Responsable: {{$promo->pilote->username}}</p>
        <form action="{{route('promos.show', $promo->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Consulter la promo</button>
        </form>
    @endforeach

    <form action="{{route('promos.create')}}" method="GET">
        @csrf
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Ajouter une promo</button>
    </form>
@endsection