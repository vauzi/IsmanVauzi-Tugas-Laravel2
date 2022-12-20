<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Product::query()->get();
        return response()->json([
            'status' => 'success',
            'message' => 'menampilkan keseluruhan product',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        try {
            $file = $request->file('image')->store('images/product', 'public');
            $product = Product::create([
                "name"          => $request->input('name'),
                'path_image'    => 'storage/' . $file,
                'stock'         => $request->input('stock'),
                'price'         => $request->input('price'),
                'description'   => $request->input('description'),
            ]);
            return response()->json([
                'status'    => 'success',
                'message'   => 'created product successfully',
                'data'      => $product
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);
            if ($product === null) {
                return response()->json([
                    'status' => 'filled',
                    'message' => 'product find by id not found',
                    'data' => $product
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'product find by id was successfully',
                'data' => $product
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
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
            return response()->json([
                'status' => 'success',
                'message' => 'product updated successfully'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $delete = Product::find($id);
            if ($delete === null) {
                return response()->json([
                    'status' => 'filled',
                    'message' => 'product find by id not found',
                    'data' => $delete
                ], 404);
            }
            unlink(public_path($delete->path_image));
            $delete->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'product deleted successfully'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
