<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\User;
use App\Mail\MailPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $user = Auth::user();

        return view('admin.posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $path = $request->file('image_path')->store('images', 'public');
      $new_post = new Post();
      $new_post->user_id = Auth::id();
      $new_post->title = $data['title'];
      $new_post->content = $data['content'];
      $new_post->image_path = $path;

      $new_post->save();

      Mail::to($new_post->user->email)->send(new MailPost);

      return redirect()->route('posts.show', $new_post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $posts = Post::all();

      return view ('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate($this->validazione());

      $data_request = $request->all();

        if (isset($data_request['image_path'])) {
          $path = $request->file('image_path')->store('images', 'public');
          $post->image_path = $path;
        }
        else {
          $post->image_path = '';
        }
        $post->update();

        $post->save();
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    public function validazione() {
      return [
         'title' => 'required|max:255',
         'content' => 'required|max:1000',
         'image_path' => 'image',
       ];
    }
}
