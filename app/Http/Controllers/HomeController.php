<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(5);
        return view('home', compact('categories','products'));
    }

    public function getProducts($category_id)
    {
        $categories = Category::all();
        $products = Product::where("category_id",$category_id)->paginate(5);
        return view('products_by_category', compact('products','categories'));
    }
}
