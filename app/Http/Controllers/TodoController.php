<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class TodoController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }

    public function create(Request $request) {
        $request->validate([
            'content' => 'required|max:20',
        ]);

        $post = new Post();
        $post->content = $request->content;
        $post->save();

        return redirect()
        ->route('todos.index');
    }

    public function update (Request $request, Post $post) {

        $request->validate([
            'content' => 'required|max:20',
        ]);

        $post->content = $request->content;
        $post->save();

        return redirect()
        ->route('todos.index', $post);
    }


    public function destroy(Post $post) {
        $post->delete();

        return redirect()
        ->route('todos.index');
    }

}
