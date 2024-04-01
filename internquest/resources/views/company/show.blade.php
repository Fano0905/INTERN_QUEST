@extends('accueil')

@section('title', $company->name)

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <p>Nous travaillons dans : {{$company->area}}</p>
    <p>Vous pouvez nous trouver sur {{$company->website}}</p>

    <div class="siege bg-gray-100 p-4 border border-gray-300 rounded-md">
        <h2 class="text-red-500 text-xl font-bold mb-2">A propos de nous</h2>
        <p>Nous siègeons actuellement au </p>
        <ul style="list-style-type: none">
            <li>{{$siege->postal_code}}</li>
            <li>{{$siege->location}}</li>
            <li>{{$siege->city}}</li>
        </ul> 
    </div>
    <div class="localite bg-gray-100 p-4 border border-gray-300 rounded-md">
        <p>Mais vous pouvez aussi nous retrouver</p>
        @foreach ($locations as $location)
            <li>{{$location->location}}</li>
            <li>{{$location->postal_code}}</li>
            <li>{{$location->city}}</li>
        @endforeach
    </div>

    <div class="control">
        <a href="{{route('companies.edit', $company->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
        <form action="{{ route('companies.destroy', $company->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer L'entreprise</button>
        </form>
        <a href="{{route('companies.evaluate', $company->id)}}"><button class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Noter</button></a>
    </div>
</div>
@endsection()