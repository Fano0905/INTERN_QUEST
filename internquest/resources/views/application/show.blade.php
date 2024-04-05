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
                        <form action="{{ route('applications.destroy', $application->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-32 h-16 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium ml-2">Retirer candidature</button>
                        </form>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
