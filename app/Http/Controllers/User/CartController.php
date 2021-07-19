<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $active = auth()->user()->activeCart;
        if($active === null)
        {
            return view('user.cart.empty');
        }
        return view('user.cart.index')->with(['products' => $active->products, 'cart' => $active]);
    }

    public function addToCart(Product $product, Request $request)
    {
        try {
            $active = auth()->user()->activeCart;
            if($active === null)
            {
                $cart = new Cart;
                $cart->user()->associate(auth()->user());
                $cart->active = true;
                $cart->save();
                $cart->products()->attach($product);
                $cart->updateQuantity($product->id, $request->quantity);
            }
            else
            {
                $active->products()->attach($product);
                $active->updateQuantity($product->id, $request->quantity);
            }
            return redirect()->route('user.show_product', $product->id)->with('message', 'Product added to cart successfully');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function deleteFromCart(Product $product)
    {
        try {
            $active = auth()->user()->activeCart;
            $active->products()->detach($product);
            return redirect()->route('user.index_cart');
        }
        catch(\Exception $e){
            return back()->withErrors($e->getMessage());
        }

    }
}
