<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allProducts = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join('categories', 'products.category_id', '=', 'categories.id')->paginate(4);

        $data=[
            'products' => $allProducts
        ];

        return view('welcome', $data);
    }

    public function admin_home(){
        $allProducts = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join("categories", 'categories.id', '=', 'products.category_id')->paginate(4);

        $data=[
            'products' => $allProducts
        ];

        return view('welcome', $data);
    }
}
