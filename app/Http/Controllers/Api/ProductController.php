<?php namespace Ventamatic\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use Ventamatic\Category;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;
use Ventamatic\Product;

class ProductController extends Controller
{
    public function getIndex(Request $request)
    {
        $category_id=$request->input('category_id');
        $category='';
        $products = Product::search($request->input('search'));
        if($category_id){
            $category = Category::find($category_id);
            if($category){
                $category= $category->name;
            }
            $products->whereCategoryId($category_id);
        }
        $products->with([
            'branches' => function($query){
                $query->whereId(1);
            },
            'category',
        ]);
        $products=$products->get();
        return $products;
    }

    public function getCategoryCount()
    {
        return DB::select('select categories.name, sum(product_sale.quantity) as quantity,
  sum(product_sale.quantity*product_sale.price) as total
from products join product_sale ON products.id = product_sale.product_id
  JOIN categories on products.category_id = categories.id

GROUP BY category_id ;');
    }
}
