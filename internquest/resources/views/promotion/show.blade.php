@extends('accueil')

@section('title', $promo->name)

@section('content')

<strong><h1 style="text-align: center">{{$promo->name}}</h1></strong>

<div class="w-full p-10 flex flex-col items-center">
    <p>Pilote Responsable: {{$promo->pilote->username}}<d>
</div>

<strong><h2>Liste des élèves</h2></strong>

<div>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f3f3f3; border-bottom: 2px solid #ddd;">
                <th style="padding: 10px; text-align: left;">Last Name</th>
                <th style="padding: 10px; text-align: left;">First Name</th>
                <th style="padding: 10px; text-align: left;">Classe</th>
                <th style="padding: 10px; text-align: left;">supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px; text-align: left;">{{$etudiant->lname}}</td>
                    <td style="padding: 10px; text-align: left;">{{$etudiant->fname}}</td>
                    <td style="padding: 10px; text-align: left;">{{$etudiant->mail}}</td>
                    <td style="padding: 10px; text-align: left;"><form action="{{route('classes.destroy', $etudiant->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Retirer etudiant</button>
                    </form></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
</div>

<form action="{{route('classes.create')}}" method="get">
    @csrf
    <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Ajouter etudiant</button>
</form>

<a href="{{route('promos.edit', $promo->id)}}"><button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier la promo</button></a>


<form action="{{ route('promos.destroy', $promo->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer La promo</button>
</form>
@endsection()