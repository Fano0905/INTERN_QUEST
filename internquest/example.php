return [
            'link' => route('blog.show', ['slug' => 'article', 'id' => '5'])
        ];

        $post = new Post();
        $post->title = 'mon premier article';
        $post->slug = 'mon-quatrième-article';
        $post->content = 'mon-contenu';
        $post->save();


        // Création d'un élément dans la table
        /*
        $post = Post::create([
            'title' => 'new title',
            'slug' => 'Towa',
            'content' => 'pas content'
        ]);
        #*/
        //$post = Post::findorFail(1); // permet de renvoyer une erreur 404 en cas d'erreur;
        //$post = Post::paginate(1);
        //$post = Post::where('id', '>', 0)->get(); // Query builder intérêt : conversion entre traiteur de BDD, coder du sql sans passer par sql
        //return Post::all(['id', 'slug']);
        //return Post::all();

        //Principe de modification
        /*
        //$post = Post::findorFail(2);
        //$post->slug = 'Artcile 5';
        #Suppression d'un élément
        #$post->delete();
        $post = Post::where('id',  '=', 1)->update([
            'title' => 'nouveau-monde',
            'slug' => str::random(random_int(1, 10)),
            'content' => 'jamais content'
        ]);
    })->name('index'); */

    Créer un nombre conséquent d'éléments d'un attribut
    /*
        $post->tags()->createMany([[
            'name' => 'tag1',
        ], ['name' => 'tag2']]);
    */