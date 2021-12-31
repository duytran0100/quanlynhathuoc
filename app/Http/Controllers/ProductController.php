<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CalculationUnit;
use App\Models\Manufacturer;
use App\Models\Ingredient;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('products', compact('products'));
    }

    public function get($id)
    {
        $product = Product::find($id);

        return view('product_detail', compact('product'));
    }

    public function add_view()
    {
        $categories = Category::all();
        $units = CalculationUnit::all();
        $manufacturers = Manufacturer::all();
        $ingredients = Ingredient::all();
        return view('add_product', compact('categories','units','manufacturers','ingredients'));
    }

    public function add(Request $request)
    {
        $this->validate(request(), ['productname'=>'required','price'=>'required'
                                    ,'image'=>'required']);

        $filename="";

        if($request->file('image')->isValid())
        {
            $filename=$request->image->getClientOriginalName();
            $request->image->move('storage/products/'.\Carbon\Carbon::now()->format('FY'),$filename);
            $path='products/'.\Carbon\Carbon::now()->format('FY')."/".$filename;
        }

        $product = Product::create([
            'product_name'=>$request->productname,
            'price'=>$request->price,
            'unit_id'=>$request->unit,
            'category_id'=>$request->category,
            'manufacturer_id'=>$request->manufacturer,
            'description'=>$request->description,
            'image'=>$path
        ]);

        if(isset($request->ingredients))
        {
            foreach($request->ingredients as $ingredient){
                $product->ingredients()->attach($ingredient);
            }
        }

        return redirect()->action([ProductController::class,'index'])->with('success', 'Thêm sản phẩm thành công');
    }

    public function delete($id)
    {
        try{
            $product = Product::where("id", $id)->first();

            if(file_exists(public_path('storage/'.$product->image)))
            {
                unlink(public_path('storage/'.$product->image));
            }

            Product::where("id", $id)->delete();

        }catch(QueryException $ex){
             return back()->with('error', 'Sản phẩm đang được tham chiếu, không thể xóa');
        }

        return redirect()->action([ProductController::class,'index'])->with('success', 'Xóa sản phẩm thành công');
    }
    
    public function edit_view($id)
    {
        $product = Product::where("id", $id)->first();
        $categories = Category::all();
        $units = CalculationUnit::all();
        $manufacturers = Manufacturer::all();
        $ingredients = Ingredient::all();
        $prod_ig = array();
        foreach($product->ingredients as $ig){
            array_push($prod_ig, $ig->id);
        }

        return view('edit_product', compact('product', 'categories', 'units', 
            'manufacturers', 'ingredients', 'prod_ig'));
    }

    public function edit(Request $request, $id)
    {
        $this->validate(request(), ['productname'=>'required','price'=>'required']);

        $filename="";

        $product = Product::find($id);

        $product->product_name = $request->productname;
        $product->category_id = $request->category;
        $product->unit_id = $request->unit;
        $product->manufacturer_id = $request->manufacturer;
        $product->price = $request->price;
        $product->description = $request->description;

        if($request->file('image')!=null){
            if($request->file('image')->isValid())
            {
                if(file_exists(public_path('storage/'.$product->image)))
                {
                    unlink(public_path('storage/'.$product->image));
                }
                
                $filename=$request->image->getClientOriginalName();
                $request->image->move('storage/products/'.\Carbon\Carbon::now()->format('FY'),$filename);
                $path='products/'.\Carbon\Carbon::now()->format('FY')."/".$filename;

                $product->image = $path;
            }
        }

        $product->save();
        $product->ingredients()->sync($request->ingredients);

        return redirect()->action([ProductController::class,'index'])->with('success', 'Sửa sản phẩm thành công');
    }
}
