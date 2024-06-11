<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'visibility' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->visibility = $request->input('visibility');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'visibility' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->visibility = $request->input('visibility');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function dashboard()
    {
        $posts = Post::with('category')->paginate(10);
        return view('dashboard', compact('posts'));
    }
}
