<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Comment;
use App\Http\Controllers\PostImageController;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('postImages', 'comments')-> orderBy('id', 'desc') ->paginate(6);        
        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create a new post
        $post = new Post;
        $post->user_id = auth()->user() -> id;        
        $post->title = $request->input('title');
        $post->content = $request->input('content'); 
        $post->created_at = now();
        $post->updated_at = now(); 
        $post->save();  
        
        $request->request->set('post_id', $post -> id);
  
        // Handle file upload
        if($request->hasFile('images')) {
            // Update image paths in the database
            $img_controller = new PostImageController();
            $img_controller -> store($request);
        }  

        return redirect()->route('posts.show', ['id' => $post ->id])->with('status', 'Post created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('postImages', 'comments') ->findOrFail($id); 
        return view('posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('postImages', 'comments') ->findOrFail($id);
        return view('posts.edit', compact('post'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // Handle file upload
        if($request->hasFile('images')) {
            // Update image paths in the database
            $img_controller = new PostImageController();
            $img_controller -> store($request);
        }        
        return redirect()->route('posts.show', ['id' => $post ->id])->with('status', 'Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
