<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class CartController extends Controller
{
    public function insertCart(Request $request){
        $rules = Validator::make($request->all(),[
            'quantity' => ['required', 'min:1']
        ]);
        $rules->validate();       

        $id = $request->id;
        $selectedProduct = Product::where('id', $id)->first();
        $cart = session("cart");
        $quantity = $request->quantity;

        if($cart==null || empty($cart[$id])==true){
            $cart[$id] = [
                "product_name" => $selectedProduct->name,
                "product_price" => $selectedProduct->price,
                "product_photo" => $selectedProduct->photo,
                "quantity" => $quantity
            ];
        }
        else{
            $cart[$id]= [
                "product_name" => $selectedProduct->name,
                "product_price" => $selectedProduct->price,
                "product_photo" => $selectedProduct->photo,
                "quantity" => $cart[$id]["quantity"] + $quantity
            ];
        }

        session(["cart" => $cart]);

        return redirect('/cart');
    }

    public function getUpdateCart(Request $request){
        $id = $request->id;
        $cart = session("cart");
        
        $data = [
            "selectedCart" => $cart[$id],
            "id" => $id
        ];

        return view('cart.update-cart', $data);
    }

    public function updateCart(Request $request){
        $rules = Validator::make($request->all(), [
            'quantity' => ['required', 'min:1']
        ]);
        $rules->validate();

        $id = $request->id;
        $cart = session("cart");
        $quantity = $request->quantity;

        $cart[$id] = [
            "product_name" => $cart[$id]["product_name"],
            "product_price" => $cart[$id]["product_price"],
            "product_photo" => $cart[$id]["product_photo"],
            "quantity" => $quantity
        ];
        
        session(["cart" => $cart]);
        return redirect('/cart');
    }

    public function deleteCart(Request $request){
        $id = $request->id;

        $cart = session("cart");
        unset($cart[$id]);
        session(["cart"=>$cart]);
        
        return redirect('/cart');
    }

    public function insertTransaction(){
        $cart = session("cart");
        
        $header = new TransactionHeader;
        $header->user_id = Auth::user()->id;
        $header->date = date('Y-m-d');
        $header->save();

        foreach($cart as $ct=>$val){
            $detail = new TransactionDetail;

            $detail->transaction_header_id = $header->id;
            $detail->product_id = $ct;
            $detail->quantity = $val["quantity"];

            $detail->save();
        }

        session()->forget("cart");

        return redirect('/history');
    }
}
