<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('user.upload');
    }

    public function store(Request $request)
    {
        if ($request->method() == "GET") return view('user.upload');

        $file = $request->file('image')->store('images/upload', 'public');
        // $file->move("images/upload", $file->hashName());
        // $path = $request->getSchemeAndHttpHost() . 'images/upload/' . $file;
        // $fileName = $request->image

        // $file = $request->file("gambar");
        // $path = $file->store("gambar", 'public');
        // // return Storage::($path);
        // $file->move("gambar", $file->hashName());
        // $fileModel = new Upload;

        // dd($file);
        return redirect()->back();
    }
}
