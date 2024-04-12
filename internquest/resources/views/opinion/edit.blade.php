@extends('layout')

@section('title', $company->name)

@section('content')

<h1 style="text-align: center"><strong>Nous sommes à votre écoute</strong></h1>


<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-xl bg-white p-10 rounded-lg shadow-lg">
        <form action="{{route('companies.e_update', $evaluation->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="relative mb-2 flex flex-col">
                <label for="username" class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Identifiant</label>
                <input type="number" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('user_id')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-2 flex flex-col">
                <label for="note" class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Noter</label>
                <select name="note" id="note" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @foreach ($notes as $note)
                    <option value="{{ $note }}">{{ $note }}</option>
                @endforeach
                </select>
                @error('note')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>          
            <div class="relative mb-2 flex flex-col">
                <label for="company_id" class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Entreprise</label>
                <input type="number" name="company_id" id="company_id" value="{{$evaluation->company_id}}" data-name="{{ $company->name }}" title="{{ $company->name }}" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                @error('company_id')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-2 flex flex-col">
                <label for="title" class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Titre</label>
                <input type="text" name="title" id="title" value="{{$evaluation->title}}" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400" required>
                @error('title')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-2 flex flex-col">
                <label for="commentaire" class=class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Commentaire</label>
                <textarea name="comment" id="comment" cols="50" rows="10" placeholder="Laisser un commentaire" class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">{{$evaluation->comment}}</textarea>
                @error('comment')
                <p style="color: red;">{{$message}}</p>
            @enderror
            </div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Soumettre</button>
            <a href="{{ url()->previous() }}">
                <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
                    Annuler
                </button>
            </a>
        </form>
    </div>
</div>

@endsection()