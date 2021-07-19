<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('user.index')->with(['products' => $products, 'categories' => $categories]);
    }

    public function indexCategory(Category $category){
        $categories = Category::all();
        return view('user.index')->with([
            'products' => $category->products()->paginate(9),
            'categories' => $categories,
            'active_ctg' => $category
        ]);
    }

    public function show(Product $product)
    {
        return view('user.show')->with('product', $product);
    }
}
