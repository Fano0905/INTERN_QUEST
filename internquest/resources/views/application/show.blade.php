@extends('accueil')

@section('title', 'Mes Candidatures')

@section('content')
    Vous avez postulé à :
    <div class="flex flex-col w-full">
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            @foreach ($applications as $application)
                <div class="max-w-7xl mx-auto px-4">
                    @foreach ($application->offres as $offre)
                        <p>{{ $offre->title }}</p>
                        <p>{{ $offre->description }}</p>
                        <p>{{ $offre->duration }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
