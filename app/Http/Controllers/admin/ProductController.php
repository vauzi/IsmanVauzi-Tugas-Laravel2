<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        return view('admin.product.index', ['data' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image')->store('images/product', 'public');
        Product::create([
            "name"          => $request->input('name'),
            'path_image'    => 'storage/' . $file,
            'stock'         => $request->input('stock'),
            'price'         => $request->input('price'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', ['data' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.edit', ['data' => $product]);
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
        $update = Product::findOrFail($id);
        if ($request->file('image') !== null) {
            $file = 'storage/' . $request->file('image')->store('images/product', 'public');
            unlink(public_path($update->image));
        } else {
            $file = $update->image;
        }
        $file = ($request->file('image') !== null) ?: $update->path_image;
        $update->update([
            "name"          => $request->input('name'),
            'path_image'    => $file,
            'stock'         => $request->input('stock'),
            'price'         => $request->input('price'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('product.show', $update->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::findOrfail($id);
        unlink(public_path($delete->path_image));
        $delete->delete();
        return redirect()->route('product');
    }
}
