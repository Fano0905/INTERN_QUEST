@extends('base')

@section('title', 'Commentaires')
    <div class="localite bg-gray-100 p-4 border border-gray-300 rounded-md">
        Vous avez été actif dernièrement!
        @foreach ($evaluations as $evaluation)
            <h2><li>{{$evaluation->title}}</li></h2>
            <li>{{$evaluation->comment}}</li>
            <li>{{$evaluation->entreprises->name}}</li>
            <li>{{$evaluation->created_at}}</li>
            <li>{{$evaluation->updated_at}}</li>
            <a href="{{route('companies.e_edit', $evaluation->id)}}"><button class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier</button></a>
        @endforeach
    </div>
@endsection