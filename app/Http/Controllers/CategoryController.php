<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PDO;

class CategoryController extends Controller
{
    public function getInsertPage(){
        return view('admin.insert-category');
    }

    public function insertCategory(Request $request){
        $rules = Validator::make($request->all(), [
            'category_name' =>['required', 'unique:categories', 'min:2'],
        ]);
        $rules->validate();

        $obj = new Category;
        $obj->category_name = $request->category_name;
        $obj->save();

        return redirect('/admin/home');
    }

    public function getUpdatePage(Request $request){
        $id = $request->id;
        $selectedCategory = Category::where('id',$id)->first();

        $data=[
            'selectedCategory' => $selectedCategory
        ];

        return view('admin.update-category', $data);
    }

    public function updateCategory(Request $request){
        $rules = Validator::make($request->all(), [
            'category_name' =>['required', 'min:2', Rule::unique('categories')->ignore($request->id)],
        ]);
        $rules->validate();

        $id = $request->id;
        $name = $request->category_name;

        Category::where('id', $id)->update([
            'category_name' => $name
        ]);

        return redirect('/admin/home');
    }

    public function deleteCategory(Request $request){
        $id = $request->id;
        $selectedCategory = Category::where('id',$id)->first();
        $selectedCategory->delete();

        return redirect('home');
    }
}
