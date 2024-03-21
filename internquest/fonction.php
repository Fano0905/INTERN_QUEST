<?php

/* Je vais noter ici toutes les fonctions intéressantes selon les différents fichiers utilisés lors du projet */

# Web.php #
Route::prefix('/blog')->name('blog.')->controller(Controller::class)->group(function() {}); // Groupement d'un URL ayant un prefix commun

# Controller.php
        $post = Post::findorFail(1); // permet de renvoyer une erreur 404 en cas d'erreur;
        $post = Post::paginate(1); // détermine le nombre d'éléments que vous affichez sur UNE page
        $post = Post::where('id', '>', 0)->get(); // Query builder intérêt : conversion entre traiteur de BDD, coder du sql sans passer par sql
        return Post::all(['id', 'slug']);
        return Post::all();
        $tags = $post->tags()->detach(2); #affecter quelque chose à une table
        $tags = $post->tags()->sync(2); #même chose
        //Principe de modification
        $post = Post::findorFail(2);
        $post->slug = 'Artcile 5';
        #Suppression d'un élément
        #$post->delete();
        $post = Post::where('id',  '=', 1)->update([
            'title' => 'nouveau-monde',
            'slug' => str::random(random_int(1, 10)),
            'content' => 'jamais content'
        ]);
        /*
        if ($post !== $slug) {
            return to_route("blog.show", ['slug' => $post->slug, 'post' => $post->post, 'id' => $post->id]);
        }
        */
    $post = Post::create([
        'title' => $request->input('title'),
        'content' => $request->input(('content')),
        'slug' => str::slug($request->input('title'))
    ]);

    //Créer un nombre conséquent d'éléments d'un attribut
        $post->tags()->createMany([[
            'name' => 'tag1',
        ], ['name' => 'tag2']]);
#Request
return [
    'title' => ['min:4','required'],
    'slug' => ['required','regex:/^[a-z0-9\-]$/']
];

#Model
//Affecter une clé étrangère
public function category(){
    return $this->belongsTo(Category::class);
}

//Relation one to many

public function tags(){
    return $this->belongsToMany(Tag::class);
}

// Création de clé étrangère

Schema::create('post_tag', function(Blueprint $table){
    $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
    $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
    $table->primary(['post_id', 'tag_id']);
});

<select class="form-control" id="category" name="category_id">
<option value="">Sélectionnez une catégorie</option>
@foreach ($categories as $category)
    <option @selected(old('category_id', $post->category_id) == $category->id) value="{{$category->id}}">{{$category->name}}</option>
@endforeach
</select>
@error('category_id')

dd(Auth::user()); // Vérifier si un utilisateur est connecté


{
    $request->validate([
        'nom' => ['required','min:3'],
        'prenom' => ['required','min:4'],
        'email' => ['required','unique:users,email', Rule::unique('users')->ignore($this->route()->parameter('user'))],
        'password' => ['required', 'min:6'],
        'username' => ['required','unique:users,username', Rule::unique('users')->ignore($this->route()->parameter('user'))]]);