@extends('accueil')

@section('title', $company->name)

@section('content')

<h1 style="text-align: center"><strong>We are listening to your opinion</strong></h1>

<p>Let us know what's on your mind</p>

<div class="evaluation"">
    <form action="{{route('companies.e_store', $company->id)}}" method="POST">
        @csrf
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Username</label>
            <input type="text" name="user" id="user" value="{{Auth::user()->username}}" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Give us a note</label>
            <input type="number" name="note" id="note" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Title</label>
            <input type="text" name="titre" id="titre" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
        </div>
        <div class="relative mb-6">
            <label for="note" class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Comment</label>
            <textarea name="comment" id="comment" cols="50" rows="10" placeholder="Leave a comment" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400"></textarea>
        </div>
        <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-green-400 font-medium">Evaluate</button>
    </form>
</div>

@endsection()