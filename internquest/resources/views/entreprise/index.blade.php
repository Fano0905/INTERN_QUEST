@extends('accueil')

@section('title', 'Entreprises')

@section('content')
@foreach ($entreprises as $entreprise)
    <p>Nom {{$entreprise->nom}}</p>
    <p>Secteur {{$entreprise->secteur}}</p>
    <p>Localite {{$entreprise->localite}}</p>
    <p>Pilote Assigné {{$entreprise?->id_pilote}}</p>
    <p>Site {{$entreprise->site}}</p>
    <p>Evaluation {{$entreprise->evaluation}}</p>
@endforeach
@endsection()