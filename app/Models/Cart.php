<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function quantity($product_id){
        return $this->hasMany(CartProduct::class)->where('product_id',$product_id)->first()->quantity;
    }

    public function updateQuantity($product_id, $quantity){
        return $this->hasMany(CartProduct::class)->where('product_id',$product_id)->first()->update(['quantity' => $quantity]);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }


}
