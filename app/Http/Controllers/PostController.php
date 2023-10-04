<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id', 'name'])->get();

        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'user_id' => 'required|integer',
        ], [
            'title.required' => 'Post title is required.',
            'user_id.required' => 'User ID is required.',
            'user_id.integer' => 'User ID must be an integer.',
        ]);

        $post = new Post;
        
        $post->title = $validatedData['title'];
        $post->user_id = $validatedData['user_id'];

        $post->save();

        Session::flash('message-success', 'Post created successfully!');

        return Redirect::to('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Redirect::to('posts');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return Redirect::to('posts');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return Redirect::to('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Redirect::to('posts');
    }
}
