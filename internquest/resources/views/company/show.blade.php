@extends('accueil')

@section('title', $company->name)

@section('content')

<div class="flex flex-col w-full h-screen"> <!-- Flexbox pour centrer verticalement et horizontalement -->
    <div class="flex flex-col items-center"> <!-- Flexbox pour centrer les éléments verticalement -->

        <strong><h1 style="text-align: center">{{$company->name}}</h1></strong>

        <strong><h2>Liste des adresses</h2></strong>

        <div class="bg-gray-200 p-4 rounded-lg" style="width: 600px;"> <!-- Fixer la largeur à 600px -->
            <div style="max-height: 400px; overflow-y: auto; width: 100%;"> <!-- Dimensions fixes et défilement vertical -->
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f3f3; border-bottom: 2px solid #ddd;">
                            <th style="padding: 10px; text-align: left;">Ville</th>
                            <th style="padding: 10px; text-align: left;">Code postal</th>
                            <th style="padding: 10px; text-align: left;">Adresse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->locations as $location)
                            <tr class="divide-y divide-blue-500 my-4">
                                <td style="padding: 10px; text-align: left;">{{$location->city}}</td>
                                <td style="padding: 10px; text-align: left;">{{$location->postal_code}}</td>
                                <td style="padding: 10px; text-align: left;">{{$location->location}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>

        <strong><h2>Selon les utilisateurs</h2></strong>

        <div class="bg-gray-200 p-4 rounded-lg" style="width: 600px;"> <!-- Fixer la largeur à 600px -->
            <div style="max-height: 400px; overflow-y: auto; width: 100%;"> <!-- Dimensions fixes et défilement vertical -->
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f3f3; border-bottom: 2px solid #ddd;">
                            <th style="padding: 10px; text-align: left;">Commentateurs</th>
                            <th style="padding: 10px; text-align: left;">Note</th>
                            <th style="padding: 10px; text-align: left;">Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->notes as $evaluation)
                            <tr class="divide-y divide-blue-500 my-4">
                                <td style="padding: 10px; text-align: left;">{{$evaluation->evaluation->username}}</td>
                                <td style="padding: 10px; text-align: left;">{{$evaluation->note}}</td>
                                <td style="padding: 10px; text-align: left;">{{$evaluation->comment}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>

        <div class="flex justify-end mt-4"> <!-- Flexbox pour aligner à droite -->

            <a href="{{route('companies.evaluate', $company->id)}}"><button type="submit" class="w-32 h-16 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium ml-2 mr-1">Laisser un avis</button></a>

            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Pilote')

                <a href="{{route('companies.edit', $company->id)}}"><button type="submit" class="w-32 h-16 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium ml-2 mr-1">Modifier l'entreprise</button></a>

                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-32 h-16 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium ml-2">Supprimer l'entreprise</button>
                </form>
            @endif
        </div>
    </div>
</div>

@endsection
