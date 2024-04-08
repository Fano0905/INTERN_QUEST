@extends('layout')

@section('content')
<div id="insert_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="w-full p-10 flex flex-col items-center">
        <h2 class="text-2xl text-blue-600 mb-6">Ajouter etudiant</h2>
        <form action="{{route('classes.store')}}" method="POST" class=w-full>
            @csrf
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Promo concerné</label>
                <select type="number" name="promo_id" id="promo_id" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @foreach ($promos as $promo)
                        <option value="{{ $promo->id }}" @if ($loop->first) selected @endif>
                            {{ $promo->name }}
                        </option>
                    @endforeach
                </select>                
                @error('promo_id')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Etudiant</label>
                <select name="user_id" id="user_id" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @foreach ($etudiants as $etudiant)
                        <option @if ($loop->first) selected @endif value="{{$etudiant->id}}" data-name="{{ $etudiant->username }}" title="{{ $etudiant->username }}">{{ $etudiant->fname }}, {{ $etudiant->lname }}</option>
                    @endforeach
                </select>
                <span>
                    @error('user_id')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </span>
            </div>
        <div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Ajouter Etudiant</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
            Annuler
        </button>
    </a>
</div>
</div>
@endsection()