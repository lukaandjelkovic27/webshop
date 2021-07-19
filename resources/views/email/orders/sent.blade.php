@component('mail::message')
# Order {{$order->id}} sent

User with the name {{$order->user->name}} made an order with this products:
@foreach($cart->products as $product)
<li>Product:{{$product->title}} Quantity: {{$product->pivot->quantity}}</li>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
