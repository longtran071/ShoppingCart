<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts() {
        $result = Product::all()->toArray();
        return response()->json([
            'message' => "Success",
            'code' => 'Get all products successfully',
            'successfully' => true,
            'data' => $result
        ]);
    }

    public function addProductToCart(Request $request) {
        $product = Cart::where('ProductId', intval($request->id))->first();
        if ($product) {
            return response()->json([
                'message' => 'warning',
                'code' => 'Product already exists',
                'successfully' => true,
                'data' => null,
            ]);
        } else {
            // $product = new Cart(['ProductID' => $request->id,'Quantity' => 1]);
            $product = Cart::create([
                'ProductID' => intval($request->id),
                'Quantity' => 1,
            ]);
        }
        return response()->json([
            'message' => 'success',
            'code' => 'Add product successfully',
            'successfully' => true,
            'data' => true
        ]);
    }
    
}
