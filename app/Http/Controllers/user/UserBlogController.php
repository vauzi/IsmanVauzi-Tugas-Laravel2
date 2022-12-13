<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $blog = Blog::get();
        return view('user.blog', ['data' => $blog]);
    }
    public function readMore($id)
    {
        $blog = Blog::findOrFail($id);
        return view('user.get-blog', ['data' => $blog]);
    }
}
