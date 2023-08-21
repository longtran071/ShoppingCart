<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function decreaseQuantity($id) {
        $product = Cart::where('ProductId', $id)->first();
        if($product->Quantity <= 1) {
            $product->delete();
            return response()->json([
                'message' => 'success',
                'code' => 'Delete product',
                'sucessfully' => true,
                'data' => null
            ]);
        }
        else{
            $product->Quantity -= 1;
            $product->save();
            return response()->json([
            'message' => 'success',
            'code' => 'Increase Quantity successfully',
            'successfully' => true,
            'data' => $product
            ]);
        }
    }

    public function increaseQuantity($id) {
        $product = Cart::where('ProductId', $id)->first();
        $product->Quantity += 1;
        $product->save();
        return response()->json([
            'message' => 'success',
            'code' => 'Increase Quantity successfully',
            'successfully' => true,
            'data' => $product
        ]);
    }

    public function deleteProduct($id){
        $product = Cart::where('ProductId', $id);
        $product->delete();
        return response()->json([
            'message' => 'success',
            'code' => 'Delete product',
            'sucessfully' => true,
            'data' => null
        ]);
    }
}
