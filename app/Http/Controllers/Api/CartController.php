<?php

namespace Ventamatic\Http\Controllers\Api;

use Cart;
use Illuminate\Http\Request;
use Ventamatic\BranchProduct;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;
use Ventamatic\Product;

class CartController extends Controller
{
    public function getIndex(){
        return Cart::getContent();
    }

    public function postIndex(Request $request, $id,$quantity){
        /** @var Product $product */
        $product = Product::findOrFail($id);
        $productInCart = Cart::get($id);
        /** @var BranchProduct $branchProduct */
        $branchProduct=$product->branchProduct->first();
        if($productInCart){
            $myquantity=$productInCart->quantity +$quantity;
        }else{
            $myquantity = $quantity;
        }
        if($myquantity <= $branchProduct->stock){

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $branchProduct->price,
                'quantity' => $quantity,
                'attributes' => []
            ]);
            return ['success' => true,
                'cart' =>$productInCart->quantity ,
                'branch' =>$branchProduct,
            'my' => $myquantity];
        }else{
            return ['success' => false,
                'branch' =>$branchProduct,
                'my' => $myquantity];
        }

    }

    public function putIndex(Request $request)
    {
        return Cart::update($request->get('id'), []);
    }

    public function deleteIndex($id)
    {
        return Cart::remove($id);
    }

    public function deleteDestroy()
    {
        return Cart::clear();
    }
}
