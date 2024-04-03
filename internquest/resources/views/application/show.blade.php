@extends('accueil')

@section('title', 'Mes Candidatures')

@section('content')
    Vous avez postulé à :
    @foreach ($applications as $application)
        <div class="max-w-7xl mx-auto px-4">
            @foreach ($application->offre as $offre)
                <h2>{{ $offre->title }}</h2>
                <ul>
                    <li>{{$offre->entreprise->name}}</li>
                    <li>{{$offre->city}}</li>
                    <li>{{$offre->description}}</li>
                </ul>
            @endforeach
        <p>{{ $application->cv }}</p>
        <p>{{ $application->cover_letter }}</p>
        </div>
    @endforeach
@endsection