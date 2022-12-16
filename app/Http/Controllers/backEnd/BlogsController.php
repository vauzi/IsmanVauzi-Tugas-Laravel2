<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function index()
    {
        $blog = Blog::get();
        return response()->json([
            'status' => 'success',
            'message' => 'success',
            'data' => $blog,
        ]);
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $blog
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => ['required'],
                'writer'    => ['required'],
                'image'     => ['required'],
                'content'   => ['required'],
            ],
            [
                'required' => ':attribute harus di isi',
            ]
        );
        if ($validator->fails()) return response()->json($validator->errors(), 400);

        try {
            $image = $request->file('image')->store('images/blog', 'public');
            $post = Blog::create([
                'title'     => $request->title,
                'writer'    => $request->writer,
                'slug'      => Str::slug($request->title),
                'image'     => 'storage/' . $image,
                'content'   => $request->content,
            ], 201);
            return response()->json([
                'status' => 'success',
                'data' => $post,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title'     => ['required'],
                'writer'    => ['required'],
                'content'   => ['required'],
            ],
            [
                'required' => ':attribute harus di isi',
            ]
        );
        if ($validator->fails()) return response()->json($validator->errors(), 400);

        try {
            $data = Blog::findOrFail($id);
            $image = ($request->file('image') !== null) ? 'storage/' . $request->file('image')->store('images/blog', 'public') : $data->image;
            $data->update([
                'title' => $request->input('title'),
                'writer' => $request->input('writer'),
                'slug' => Str::slug($request->input('title')),
                'image' => $image,
                'content' => $request->input('content'),
            ]);
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
            unlink(public_path($data->image));
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Deleted successfully!!',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
