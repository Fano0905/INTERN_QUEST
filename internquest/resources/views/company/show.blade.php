@extends('accueil')

@section('title', $promo->name)

@section('content')

<div class="flex justify-center items-center h-screen"> <!-- Flexbox pour centrer verticalement et horizontalement -->
    <div class="flex flex-col items-center"> <!-- Flexbox pour centrer les éléments verticalement -->

        <strong><h1 style="text-align: center">{{$promo->name}}</h1></strong>
        <p>Pilote Responsable: {{$promo->pilote->username}}</p>

        <strong><h2>Liste des élèves</h2></strong>

        <div class="bg-gray-200 p-4 rounded-lg" style="width: 600px;"> <!-- Fixer la largeur à 600px -->
            <div style="max-height: 400px; overflow-y: auto; width: 100%;"> <!-- Dimensions fixes et défilement vertical -->
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background-color: #f3f3f3; border-bottom: 2px solid #ddd;">
                            <th style="padding: 10px; text-align: left;">Nom</th>
                            <th style="padding: 10px; text-align: left;">Prénom</th>
                            <th style="padding: 10px; text-align: left;">Identifiant</th>
                            <th style="padding: 10px; text-align: left;">supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr class="divide-y divide-blue-500 my-4">
                                <td style="padding: 10px; text-align: left;">{{$etudiant->lname}}</td>
                                <td style="padding: 10px; text-align: left;">{{$etudiant->fname}}</td>
                                <td style="padding: 10px; text-align: left;">{{$etudiant->username}}</td>
                                <td style="padding: 10px; text-align: left;"><form action="{{route('classes.destroy', $etudiant->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-16 h-16 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">-</button>
                                </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
        </div>

        <div class="flex justify-end mt-4"> <!-- Flexbox pour aligner à droite -->
            <a href="{{route('promos.edit', $promo->id)}}"><button type="submit" class="w-32 h-16 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium ml-2 mr-1">Modifier la promotion</button></a>

            <form action="{{route('classes.create')}}" method="get">
                @csrf
                <button type="submit" class="w-32 h-16 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium ml-1">Ajouter un étudiant</button>
            </form>

            <form action="{{ route('promos.destroy', $promo->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-32 h-16 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium ml-2">Supprimer la promotion</button>
            </form>
        </div>
    </div>
</div>

@endsection
