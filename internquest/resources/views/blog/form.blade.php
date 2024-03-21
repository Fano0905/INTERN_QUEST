<form action="" method="post" class="form-control" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="image">Image</label>
        <input class="form-control" type="file" name="image" id="image">
        @error('image')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="title">Titre</label>
        <input class="form-control type="text" name="title" value="{{old('title', $post->title)}}">
        @error('title')
            {{$message}}
        @enderror
    </div>
    <div>
        <label for="slug">Slug</label>
        <input class="form-control type="text" id="slug" name="slug" value="{{old('slug', $post->slug)}}">
        @error('slug')
        {{$message}}
        @enderror
    </div>
    <div>
        <label for="content">Contenu</label>
        <textarea class="form-control name="content">{{old('content', $post->content)}}</textarea>
        @error('content')
            {{$message}}            
        @enderror
    </div>
    <div>
        <label for="category">Catégorie</label>
        <input type="number" name="category_id" value="{{old('value', $post->category_id)}}">
        @error('category')
            {{$message}}
        @enderror
    </div>
    <button class="btn btn-primary">
        @if ($post->id)
            Modifier
        @else
            Créer
        @endif
    </button>
</form>