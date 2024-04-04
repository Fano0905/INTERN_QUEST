@extends('accueil')

@section('title', $company->name)

@section('content')

<h1 style="text-align: center"><strong>Nous sommes à votre écoute</strong></h1>


<div class="evaluation">
    <form action="{{route('companies.e_store', $company->id)}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label for="username" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Identifiant</label>
            <input type="number" name="user_id" id="user_id" value="{{Auth::user()->id}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('user_id')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Noter</label>
            <select name="note" id="note" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
              @foreach ($notes as $note)
                <option value="{{ $note }}">{{ $note }}</option>
              @endforeach
            </select>
            @error('note')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>          
        <div class="relative mb-6">
            <label for="company_id" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Entreprise</label>
            <input type="number" name="company_id" id="company_id" value="{{$company->id}}" data-name="{{ $company->name }}" title="{{ $company->name }}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
            @error('company_id')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label for="title" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Titre</label>
            <input type="text" name="title" id="title" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400" required>
            @error('title')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>
        <div class="relative mb-6">
            <label for="commentaire" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Commentaire</label>
            <textarea name="comment" id="comment" cols="50" rows="10" placeholder="Leave a comment" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400"></textarea>
            @error('comment')
            <p style="color: red;">{{$message}}</p>
        @enderror
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Soumettre</button>
        <a href="{{route('internquest')}}"><button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">Annuler</button>
    </form>
</div>

@endsection()