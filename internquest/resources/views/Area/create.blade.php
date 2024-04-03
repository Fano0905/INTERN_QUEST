@extends('layout')

@section('content')
    <form action="{{route('areas.store')}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label for="name" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Name</label>
            <input type="text" required placeholder="nom" name="secteur" id="secteur" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('name')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Soumettre</button>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
            Annuler
        </button>
    </a>
@endsection()