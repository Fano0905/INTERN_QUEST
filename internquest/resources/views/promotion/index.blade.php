@extends('accueil')
@section('content')
    @foreach ($promos as $promo)
        <h2>{{$promo->promotion}}</h2>
        <p>{{$promo->users}}</p>
    @endforeach
@endsection