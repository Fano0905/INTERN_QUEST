@extends('accueil')

@section('title', $company->name)

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <p>Area : {{$company->area}}</p>
    <p>Location : {{$company->location}}</p>
    <p>Assigned Pilot : {{$company?->id_pilote}}</p>
    <p>Website : {{$company->website}}</p>
    <p>Evaluation {{$company->evaluation}}</p>
    <div class="control">
        <a href="{{route('companies.edit', $company->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Edit</button></a>
        <form action="{{ route('companies.destroy', $company->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Delete Account</button>
        </form>
        <a href="{{route('companies.evaluate', $company->id)}}"><button class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Evaluate</button></a>
    </div>
</div>
@endsection()