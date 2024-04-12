@extends('layout')

@section('title', 'My Applications')

@section('content')
<h1>Candidatures pour l'offre : <strong style="font-size: 32px"> {{ $offer->title }} </strong></h1>

@foreach ($applications as $application)
    <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
        <p class="bg-blue-600 text-white rounded-lg" style="text-align: center">Candidat : {{ $application->etudiant->lname }}, {{ $application->etudiant->fname }}</p>
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            <p>CV : {{ $application->cv }}</p>
        </div>
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            <p>Lettre de motivation : {{ $application->cover_letter }}</p>
        </div>
    </div>
@endforeach
@endsection