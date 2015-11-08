<?php namespace Ventamatic\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Ventamatic\Category;
use Ventamatic\Http\Requests;
use Ventamatic\Http\Controllers\Controller;
use Ventamatic\Product;
use View;

class ProductController extends Controller
{
    function __construct()
    {
        View::share('viewName', 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        return view('product.index',[
            'input' => Input::all(),
        ]);
    }

    public function getCreate(){
        $categories = Category::all();
        return view('product.create',
            ['categories' => $categories]);
    }

    public function postCreate(Request $request){

        DB::transaction(function() use($request){
            $input = $request->input();
            $product = Product::create($input);
            $product->branches()->attach(1,[
                'stock' => $input['stock'],
                'price' => $input['price']
            ]);
            $request->file('photo')->move('resources/products', $product->id);
        });

        return redirect()->back()->with(
            ['success' =>['Insertado correctamente']
            ]);

    }

    public function getDecrease(Request $request,$product_id){
        /** @var BranchProduct $pivot */
        $pivot=Product::find($product_id)->branches()->first()->pivot;

        $pivot->stock--;
        $pivot->update();
        return redirect()->back();
    }

}
