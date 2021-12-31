<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function add_view()
    {
        return view('add_category');
    }

    public function add(Request $request)
    {
        $this->validate(request(), ['categoryname'=>'required']);

        Category::create([
            'category_name'=>$request->categoryname,
        ]);

        return redirect()->action([CategoryController::class,'index'])->with('success', 'Thêm loại sản phẩm thành công');
    }

    public function edit_view($id)
    {
        $category = Category::where("id", $id)->first();

        return view('edit_category', compact('category'));
    }

    public function edit(Request $request, $id){
        $this->validate(request(), ['categoryname'=>'required']);
        
        $category = Category::find($id);

        $category->category_name = $request->categoryname;
        $category->save();

        return redirect()->action([CategoryController::class,'index'])->with('success', 'Sửa loại sản phẩm thành công');
    }

    public function delete($id){
        try{
            $category = Category::where("id", $id)->delete();
        }catch(QueryException $ex){
             return back()->with('error', 'Loại sản phẩm đang được tham chiếu, không thể xóa');
        }

        return redirect()->action([CategoryController::class,'index'])->with('success', 'Xóa loại sản phẩm thành công');
    }
}
