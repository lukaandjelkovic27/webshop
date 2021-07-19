<?php

namespace App\Mail;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSent extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $order;
    protected $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Cart $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->markdown('email.orders.sent', [
                'order' => $this->order,
                'cart' => $this->cart,
            ]);

    }
}
