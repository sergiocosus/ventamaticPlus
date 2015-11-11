<?php

namespace Ventamatic\Http\Controllers\Api;

use Auth;
use Cart;
use DB;
use Illuminate\Http\Request;
use Ventamatic\BranchProduct;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;
use Ventamatic\Product;
use Ventamatic\Sale;

class SellController extends Controller
{
    public function getIndex()
    {
        return DB::transaction(function(){
            if(count(Cart::getContent()) != 0) {
                $sale = new Sale();
                $sale->client_id = Auth::user()->id;
                $sale->user_id = Auth::user()->id;
                $sale->branch_id = 1;
                $sale->save();
                $total = 0;

                foreach (Cart::getContent() as $cartProduct) {
                    /** @var Product $product */
                    $product = Product::findOrFail($cartProduct->id);
                    /** @var BranchProduct $branchProduct */
                    $branchProduct = $product->BranchProduct->first();
                    $sale->products()->attach($product->id, [
                        'quantity' => $cartProduct->quantity,
                        'price' => $branchProduct->price,
                    ]);
                    $total += $cartProduct->quantity *
                        $branchProduct->price;


                    $pivot=$product->branches()->first()->pivot;

                    $pivot->stock-=$cartProduct->quantity;
                    $pivot->update();
                }
                $sale->total = $total;
                $sale->update();

                Cart::clear();
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        });
    }

    public function getSales()
    {
        $sales = Sale::whereClientId(Auth::user()->id)->with([
            'products' => function($query){

            }
        ])->get();

        return json_encode($sales);
    }

    public function getAllSales(){
        $sales = Sale::select('created_at','total')
            ->orderBy('created_at')
            ->get();

        return $sales;
    }
}
