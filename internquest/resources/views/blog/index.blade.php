@extends('accueil')

@section('title', "Page d'accueil")

@section('content')
    <h1>Mon blog</h1>
    @foreach ($posts as $post)
        <article>
            <h2>{{$post->title}}</h2>    
            <p>Id: {{$post->id}}</p>
            <p>Slug: {{$post->slug}}</p>
            <p>Contenu: <br>{{$post->content}}</p>
            @if ($post->category)
                <p>Catégorie: {{$post->category?->name}}</p>
            @endif
            @if (!$post->tags->isEmpty())
                Tags :
                @foreach ($post->tags as $tag)
                    <span class="badge bg-secondary">{{$tag->name}}</span>
                @endforeach
            @endif
            <p><a href="{{route('blog.show', ['slug' => $post->slug, 'post' => $post->id])}}">Lire la suite</a></p>
        </article>
        
    @endforeach
    {{ $posts->links() }}
@endsection
