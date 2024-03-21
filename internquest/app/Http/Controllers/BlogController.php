<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index() : View{
        return view('blog.index', [
            'posts' => Post::with('tags', 'category')->paginate(10),
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View{
        return view('blog.show', ['post' => $post]);
    }
    public function create() {
        $post = new Post();
        return \view('blog.create', ['post'=> $post]);
    }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:6',
            'slug' => 'required|min:4', 'regex:/^[0-9a-z\-]+$/',
            'content' => 'required',
            'category_id' => ['exists:categories,id'], // Ajoutez cette ligne pour valider le champ category_id
            //'tags' => ['array', 'exists:tags_id', 'required'],
            'image' => ['image', 'max:2000']
        ]);
        $post = Post::create($request->all());
        return \redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
        ->with('success', "L'article a bien été sauvegardé");
    }
    public function edit(Post $post) {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
        ]);
        /*
        Post::find($post->id);
        return view('blog.edit', compact('post'));
        */
    }

    /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('blog.index')
        ->with('success', 'Post deleted successfully');
    }
    /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function update(Post $post, FormPostRequest $request) {
    
        $data = $request->validated();
        dd($data);
        $post->update($data);

        return \redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])
        ->with('success', "L'article a bien été modifié");
    }
}
