@extends('accueil')
@section('content')
    @foreach ($promos as $promo)
        <h2>{{$promo->name}}</h2>
    @endforeach
@endsection