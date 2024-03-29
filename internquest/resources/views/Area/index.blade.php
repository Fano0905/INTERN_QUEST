@extends('accueil')

@section('title', 'Secteurs présents sur le site')

<a href="{{route('areas.create')}}"><ion-icon name="add"></ion-icon></a>

@section('content')
    @foreach ($areas as $area)
        <li style="list-style-type: none;">{{$area->name}}</li>
    @endforeach
@endsection()