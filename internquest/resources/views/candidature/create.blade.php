@extends('base')

@section('title', 'Postuler')

@section('content')

<h1 style="text-align: center">Cette offre vous intéresse? Faites-le nous savoir</h1>

<div class="form-control">
    <form action="{{route('candidatures.store')}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">CV</label>
            <input type="file" name="cv" id="cv" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('cv')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Lettre de motivation</label>
            <input type="file" name="lettre" id="lettre" required  class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('lettre_de_motivation')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button>
    </form>
</div>

@endsection()