@extends('accueil')

@section('title', 'Mes Candidatures')

@section('content')
    Vous avez postulé à :
    @foreach ($applications as $application)
        <div class="max-w-7xl mx-auto px-4">
            Postée par: <p>{{$application->etudiant->username}}</p>
            <p>{{ $application->cv }}</p>
            <p>{{ $application->cover_letter }}</p>
        </div>
    @endforeach
@endsection