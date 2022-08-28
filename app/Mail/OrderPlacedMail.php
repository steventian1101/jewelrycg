<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private Order $order)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userName = auth()->user()->first_name;
        return $this->subject('Order Placed')
            ->view('emails.orders.placed')
            ->with([
                'username' => $userName,
                'orderID' => $this->order->order_id,
                'order_items' => $this->order->items->map(function($i) {
                    $i->getSelfWithProductInfo();
                    return $i->setPriceToFloat();
                })
            ]);
    }
}
