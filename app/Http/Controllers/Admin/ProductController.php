<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.index')->with(['products' => $products, 'categories' => $categories]);
    }

    public function indexCategory(Category $category){
        $categories = Category::all();
        return view('admin.product.index')->with(['products' => $category->products, 'categories' => $categories,'active_ctg' => $category->id]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create')->with('categories', $categories);
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $product = new Product;
            $product->fill($request->all());
            $product->save();
            $product->categories()->attach($request->categories);

            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->file('image')->storeAs('images', $newImageName, 'public');
            $product->image_path = $newImageName;
            $product->update();

            return redirect()->route('admin.new-product')->with('message', 'Product posted successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function show(Product $product)
    {
        return view('admin.product.show')->with('product', $product);
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit')->with('product', $product);
    }

    public function editProductCategory(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.editProductCategory')->with(['product' => $product,'productCategories' => $product->categories, 'categories'=>$categories]);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        try {
            $product->fill($request->all());
            if ($request->has('image')) {
                $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension(); //kako da obrisem staru sliku
                $request->file('image')->storeAs('images', $newImageName, 'public');
                $product->image_path = $newImageName;
            }
            $product->update();
            return redirect()->route('admin.products')->with('message', 'Product edited successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function updateProductCategory(Request $request, Product $product){
        try {
            $product->categories()->detach();
            $product->categories()->attach($request->categories);
            return redirect(route('admin.products'))->with('message', 'Product Categories edited successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect(route('admin.products'))->with('message', 'Product deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function destroyProductCategory(Product $product)
    {
        try {
            $product->categories()->detach();
            return redirect(route('admin.products'))->with('message', 'Product categories deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}
