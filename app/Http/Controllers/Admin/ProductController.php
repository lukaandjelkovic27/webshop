<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.index')->with(['products' => $products, 'categories' => $categories]);
    }

    public function indexCategory(Category $category){
        $categories = Category::all();
        return view('admin.index')->with(['products' => $category->products, 'categories' => $categories,'active_ctg' => $category->id]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.create')->with('categories', $categories);
    }

    public function store(Request $request)
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
