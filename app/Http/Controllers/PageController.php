<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $allProducts = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join('categories', 'products.category_id', '=', 'categories.id')->paginate(4);

        $data=[
            'products' => $allProducts
        ];
        
        return view('welcome', $data);
    }

    public function searching(Request $request){
        $searched = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join('categories', 'products.category_id', '=', 'categories.id')->where('name', 'like', "%$request->query_param%")->paginate(6);
        $data = [
            'products' => $searched
        ];
        return view('welcome', $data);
    }

    // admin
    public function adminViewProduct()
    {
        $allProducts = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join("categories", 'categories.id', '=', 'products.category_id')->get();

        $data=[
            'products' => $allProducts
        ];

        return view('admin.view-product', $data);
    }

    public function adminViewCategory()
    {
        $allCategories = Category::all();

        $data=[
            'categories' => $allCategories
        ];
        
        return view('admin.view-category', $data);
    }

    public function getCartView()
    {
        $cart = session("cart");
        return view('cart.cart-page')->with("cart", $cart);
    }

    public function viewHistory()
    {
        $allTransaction = TransactionHeader::select(DB::raw("transaction_headers.id as headid, transaction_headers.*, transaction_details.*, products.*"))->join("transaction_details", 'transaction_details.transaction_header_id','=', 'transaction_headers.id')->join("products", 'transaction_details.product_id','=','products.id')->get();

        $data=[
            'allTransaction' => $allTransaction
        ];
        
        return view('history', $data);
    }
}
