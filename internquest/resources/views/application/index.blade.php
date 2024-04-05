@extends('accueil')

@section('title', 'My Applications')

@section('content')
<h1>Candidatures pour l'offre : {{ $offer->title }}</h1>

@foreach ($applications as $application)
    <div>
        <p>Candidat : {{ $application->etudiant->username }}</p>
        <p>CV : {{ $application->cv }}</p>
        <p>Lettre de motivation : {{ $application->cover_letter }}</p>
    </div>
@endforeach
@endsection