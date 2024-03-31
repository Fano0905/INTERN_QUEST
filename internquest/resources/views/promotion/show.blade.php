@extends('accueil')

@section('title', $promo->name)

@section('content')

<strong><h1 style="text-align: center">{{$promo->name}}</h1></strong>

<div class="w-full p-10 flex flex-col items-center">
    <p>Pilote Responsable: {{$promo->pilote->username}}<d>
</div>

<strong><h2>Liste des élèves</h2></strong>

<div>
<table>
    <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Classe</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td>{{$etudiant->lname}}</td>
                <td>{{$etudiant->fname}}</td>
                <td>{{$etudiant->mail}}</td>
                <td><form action="{{route('classes.destroy', $etudiant->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" preventReload(event)" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Retirer etudiant</button>
                </form></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<form action="{{route('classes.create')}}" method="post">
    @csrf
    <button type="submit" preventReload(event)" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Ajouter etudiant</button>
</form>

<form action="{{ route('promos.destroy', $promo->id)}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Supprimer L'entreprise</button>
</form>
@endsection()