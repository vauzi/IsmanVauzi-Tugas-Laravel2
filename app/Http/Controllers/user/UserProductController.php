<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('user.product', ['data' => $product]);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.productShow', ['data' => $product]);
    }
}
