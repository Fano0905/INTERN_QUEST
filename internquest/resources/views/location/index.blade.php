@extends('accueil')

@section('content')
    @foreach ($locations as $location)
    <div class="relative mb-6">
        <p class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">{{$location->postal_code}}</p>
        <p class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">{{$location->city}}</p>
        <p class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">{{$location->location}}</p>
        <form action="{{route('locations.edit', $location->id)}}" method="GET">
            @csrf
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier l'adresse</button>
        </form>
        <form action="{{route('locations.destroy', $location->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Effacer l'adresse</button>
        </form>        
    </div>
    @endforeach
    <div class="mt-6">
        {{ $offers->links('vendor.pagination.tailwind') }} la suite
    </div>
@endsection