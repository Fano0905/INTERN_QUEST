@extends('accueil')

@section('title', $entreprise->nom)

@section('content')

<h1>Nous sommes à votre écoute</h1>

<p>Nous vous invitions à laisser votre avis</p>

<div class="evaluation">
    <form action="{{route('entreprises.e_store', $entreprise->id)}}" method="POST">
        @csrf
        <label for="note">Laisser une note</label>
        <input type="number" name="note" id="note">
        <button type="submit" class="w-full h-11 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Evaluer</button>
    </form>
</div>

@endsection()