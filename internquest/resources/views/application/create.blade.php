@extends('layout')

@section('title', 'Postuler')

@section('content')

<h1 style="text-align: center">Cette offre vous intéresse?</h1>

<div class="form-control">
    <form action="{{route('applications.store', $offer->id)}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">CV</label>
            <input type="text" name="cv" id="cv" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('cv')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Lettre de motivation</label>
            <input type="text" name="letter" id="letter" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('cover_letter')
            <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Candidat(e)</label>
            <select name="user_id" id="user_id" required class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @foreach ($users as $user)
                    <option @if ($loop->first) value = "{{$user->id}}" selected @endif data-name="{{ $user->username }}" title="{{ $user->username }}">{{$user->lname}}, {{$user->fname}}</option>
                @endforeach
            </select>
            @error('user_id')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Postuler</button>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
                Annuler
            </button>
        </a>
</div>

@endsection()