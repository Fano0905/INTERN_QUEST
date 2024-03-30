@extends('accueil')

@section('title', $promo->name)

@section('content')

<strong><h1 style="text-align: center">{{$promo->name}}</h1></strong>

<div class="w-full p-10 flex flex-col items-center">
    <p>Pilote Responsable: {{$promo->pilote->username}}<d>
</div>

<form action="{{ route('promos.destroy', $promo->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer L'entreprise</button>
</form>

@endsection()