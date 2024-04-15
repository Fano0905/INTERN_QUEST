@extends('layout')

@section('title', 'My Applications')

@section('content')
<h1>Candidatures pour l'offre : <strong style="font-size: 32px"> {{ $offer->title }} </strong></h1>

@foreach ($applications as $application)
    @if ($application->status == 'en attente')
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            <p class="bg-blue-600 text-white rounded-lg" style="text-align: center">Candidat : {{ $application->etudiant->lname }}, {{ $application->etudiant->fname }}</p>
            <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                <p>CV : {{ $application->cv }}</p>
            </div>
            <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
                <p>Lettre de motivation : {{ $application->cover_letter }}</p>
            </div>
            <a href="{{route('applications.accept', $application->id)}}" style="padding: 10px; border-radius: 5px; color: white; background-color: green;">
                Accepter
            </a>
            <a href="{{route('applications.reject', $application->id)}}" style="padding: 10px; border-radius: 5px; color: white; background-color: red;">
                Refuser
            </a>
        </div>
    @endif
@endforeach
@endsection