@extends('layout')

@section('content')
    @foreach ($promos as $promo)
    <div class="flex justify-center">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            
            <div class="p-4 flex justify-between items-center">
                <h2 class="font-bold text-lg">{{$promo->name}}</h2>
                <span class="text-sm bg-gray-200 rounded-full px-3 py-1">Pilote Responsable: {{$promo->pilote->username}}</span>
                <span class="text-sm bg-gray-200 rounded-full px-3 py-1">Centre: {{$promo->centre}}</span>
            </div>

            
            <form action="{{route('promos.show', $promo->id)}}" method="GET" class="p-4">
                @csrf
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Consulter la promo</button>
            </form>
        </div>
    @endforeach

    <div class="mt-4">
        <form action="{{route('promos.create')}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Ajouter une promo</button>
        </form>
    </div>
    </div>
</div>
@endsection
