@extends('accueil')

@section('title', $company->nom)

@section('content')

<h1 style="text-align: center"><strong>sommes à votre écoute</strong></h1>

<p>Nous vous invitions à laisser votre avis</p>

<div class="evaluation"">
    <form action="{{route('entreprises.e_store', $company->id)}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Username</label>
            <input type="text" name="user" id="user" value="{{Auth::user()->username}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Laisser une note</label>
            <input type="number" name="note" id="note" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Titre</label>
            <input type="text" name="titre" id="titre" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Commetaires</label>
            <textarea name="comment" id="comment" cols="50" rows="10" placeholder="Laisser un commentaire" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400"></textarea>
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Entreprise concernée</label>
            <input type="number" name="ent" id="ent" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Evaluer</button>
    </form>
</div>

@endsection()