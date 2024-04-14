@extends('layout')

@section('title', 'Mes Candidatures')

@section('content')
    Vous avez postulé à :
    <div class="flex flex-col w-full">
        <div class="bg-gray-200 p-4 m-4 rounded-lg shadow-lg">
            @foreach ($applications as $application)
                <div class="max-w-7xl mx-auto px-4">
                    @foreach ($application->offres as $offre)
                        <strong><h1 style="font-size: 32px;text-align:center;">{{ $offre->title }}</h1></strong>
                        <p>{{ $offre->description }}</p>
                        <p>Durée: {{ $offre->duration }}</p>
                        <form action="{{ route('applications.destroy', $application->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-32 h-16 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium ml-2">Retirer candidature</button>
                        </form>
                    @endforeach
                </div>

                @if ($application->status == 'en attente')
                    <p style="padding: 10px; border-radius: 5px; color: white; {{ $application->status == 'accepté' ? 'background-color: green;' : 'background-color: red;' }}">
                        Statut de la candidature: {{ $application->status }}
                    </p>
                @endif
            @endforeach
        </div>
        <form action="{{ route('offers.index')}}" method="get">
            @csrf
            <button type="submit" class="w-32 h-16 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium ml-2">Postuler</button>
        </form>
    </div>
@endsection
