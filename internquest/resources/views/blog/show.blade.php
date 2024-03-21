@extends('accueil')

@section('title', "Bienvenue")

@section('content')
    <h1>Mon blog</h1>
    <article>
        <h1>{{$post->title}}</h1>
        <p>slug: {{$post->slug}}</p>
        <p>contenu: <br>{{$post->content}}</p>
        <p>{{$post->created_at}}</p>
        <p>{{$post->updated_at}}</p>
        <p>category_id: {{$post->category_id}}</p>
        <p>Catégorie: {{$post->category?->name}}</p>
    </article>
    <div class="hidden md:flex space-x-16">
        <a href="{{ route('blog.edit', $post->id) }}" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Edit</a>
        <form action="{{ route('blog.posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('DELETE')
        <button type="submit" class="py-2 px-3 bg-red-500 text-white rounded hover:bg-blue-600 transition duration-300">Delete</button>
        </form>
    </div>
@endsection