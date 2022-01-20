<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function getDetails(Request $request){
        $id = $request->id;
        $selectedProducts = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join('categories', 'products.category_id', '=', 'categories.id')->where('products.id',$id)->first();
        $data=[
            'selectedProducts' => $selectedProducts
        ];
        
        return view('details', $data);
    }

    public function getInsertPage(){
        $allCategory = Category::all();
        $data = [
            'categories' => $allCategory
        ];
        return view('admin.insert-product', $data);
    }

    public function insertProduct(Request $request){
        $rules = Validator::make($request->all(), [
            'name' => ['required', 'unique:products', 'min:5'],
            'description' => ['required', 'min:50'],
            'price' => ['required', 'integer', 'min:1'],
            'photo' => ['required', 'image', 'mimes:jpg']
        ]);
        $rules->validate();

        $image = $request->file('photo');
        $obj = new Product;

        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->category_id = $request->category;
        $obj->photo = $image->getClientOriginalName();

        Storage::putFileAs('public/products', $image, $image->getClientOriginalName());

        $obj->save();

        return redirect('/admin/home');
    }


    public function getUpdatePage(Request $request){
        $id = $request->id;
        $selectedProduct = Product::select(DB::raw("products.id as prodid, products.*, categories.*"))->join('categories', 'products.category_id', '=', 'categories.id')->where('products.id',$id)->first();
        $allCategory = Category::all();

        $data=[
            'selectedProduct' => $selectedProduct,
            'categories' => $allCategory
        ];
        
        return view('admin.update-product', $data);
    }

    public function updateProduct(Request $request){
        $rules = Validator::make($request->all(), [
            'name' => ['required', 'min:5', Rule::unique('products')->ignore($request->id)],
            'description' => ['required', 'min:50'],
            'price' => ['required', 'integer', 'min:1'],
            'photo' => ['required', 'image', 'mimes:jpg']
        ]);
        $rules->validate();

        $image = $request->file('photo');
        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $category_id = $request->category;
        $photo = $image->getClientOriginalName();

        Storage::putFileAs('public/products', $image, $image->getClientOriginalName());

        Product::where('id', $id)->first()->update([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category_id' => $category_id,
            'photo' => $photo,
        ]);

        return redirect('/admin/home');
    }


    public function deleteProduct(Request $request){
        $id = $request->id;
        $selectedProduct = Product::where('id',$id)->first();
        $selectedProduct->delete();

        return redirect('home');
    }

}
