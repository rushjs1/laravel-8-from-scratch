<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;


class AdminController extends Controller
{   

     // index, show, create, store, edit, update, destroy

    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::paginate(100)
        ]);
    }

    public function show()
    {
        return view('admin.dashboard');
    }

   public function create()
   {

      return view('admin.posts.create'); 
   }

   public function store()
   {
       ray(request()->all());

      $attributes = $this->validatePost();


      $attributes['user_id'] = auth()->id();
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');


      Post::create($attributes);

      return redirect('/')->with('success', 'Post has been successfully created.');
   }

   public function edit(Post $post)
   {
       return view('admin.posts.edit', [
           'post' => $post
       ]);
   }

   public function update(Post $post)
   {
        $attributes = $this->validatePost($post);


         if(isset($attributes['thumbnail'])){
             $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');     
         }

         $post->update($attributes);
         
         return back()->with('success', 'Post has been successfully updated.');
   }

   public function destroy(Post $post)
   {
       $post->delete();

       return back()->with('success', 'Post Deleted');
   }

   protected function validatePost(?Post $post = null): array
   {
 
    $post ??= new Post();

    return $attributes = request()->validate([
        'title' => 'required',
        'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
        'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
        'excerpt' => 'required',
        'body' => 'required',
        'category_id' => ['required', Rule::exists('categories', 'id')]
  ]);

   }
}
