@extends('base')

<h1>Vous n'aimez pas un article?</h1>

<p>Vous avez la possibilité de le supprimer</p>

<h2>Choisissez l'article que vous voulez supprimer</h2>

<div class="del">
    <form action="{{ route('delete') }}" method="post">
        @csrf
        <label for="article_id">Article à supprimer: </label>
        <input type="number" name="article_id">
        <button type="submit">Supprimer</button>
    </form>
</div>

<div class="response">
    @if (session('success'))
        @foreach ($posts as $post)
            <article>
                <h2>{{$post->title}}</h2>    
                <p>{{$post->content}}</p>
                <p>{{$post->id}}</p>
                <p>{{$post->slug}}</p>
            </article>
        @endforeach
    @else
        <p>Echec</p>
    @endif
</div>