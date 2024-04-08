@extends('layout')

@section('content')
<div id="insert_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="w-full p-10 flex flex-col items-center">
        <h2 class="text-2xl text-blue-600 mb-6">Formulaire pour changer un étudiant de classe</h2>
        <form action="{{route('classes.update', $etudiant->id)}}" method="POST" class=w-full>
            @csrf
            <input type="hidden" name="_method" value="PUT">
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
                    @foreach ($etudiant as $etudiants)
                        <option @if ($loop->first) selected @endif data-name="{{ $etudiant->fname }}, {{ $etudiant->lname }}" title="{{ $etudiant->fname }}, {{ $etudiant->lname }}">{{$etudiant->id}}</option>
                    @endforeach
                </select>
                <span>
                    @error('user_id')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </span>
            </div>
        <div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifer sa classe</button>
        </div>
    </form>
</div>
</div>
@endsection()