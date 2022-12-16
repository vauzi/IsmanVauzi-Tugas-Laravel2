<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::limit(5)->get();
        return view('admin.blog.index', ['data' => $blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->store('images/blog', 'public');
        $blog = [
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'slug' => Str::slug($request->input('title')),
            'image' => 'storage/' . $image,
            'content' => $request->input('content'),
        ];
        Blog::create($blog);
        return redirect()->route('blog.blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.show', ['data' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', ['data' => $blog]);
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
        $update = Blog::findOrFail($id);
        $image = ($request->file('image') !== null) ? 'storage/' . $request->file('image')->store('images/blog', 'public') : $update->image;
        $blog = [
            'title' => $request->input('title'),
            'writer' => $request->input('writer'),
            'slug' => Str::slug($request->input('title')),
            'image' => $image,
            'content' => $request->input('content'),
        ];

        $update->update($blog);

        return redirect()->route('blog.show', $update->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Blog::findOrFail($id);
        unlink(public_path($delete->image));
        $delete->delete();
        return redirect()->route('blog.blog');
    }
}
