<?php

namespace App\Http\Controllers;

use App\Models\PostImage;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);  

        $images = $request->file('images');
        $uploadPath = public_path('/upload_img');        

        foreach($images as $image) {
            // generate unique file name
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $imagePaths = '/upload_img/'.$imageName;

       
            // Create a new image
            $img = new PostImage();
            $img->post_id = $request->input('post_id');
            $img->url = $imagePaths;
            $img->save();                          
        }  
        return response()->json(['message' => 'Image Uploaded Successfully']);       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = PostImage::findOrFail($id);
        $img -> delete();
    }
}
