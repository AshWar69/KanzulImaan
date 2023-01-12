<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\UserDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = Order::where('id',$this->id)->where('user_id',Auth::user()->id)->first();
        $user_details = UserDetail::where('user_id',Auth::user()->id)->first();

        return $this->view('pages.ecomm.orderconfirmmail', compact( 'orders', 'user_details'))
        ->subject('Order #'.$orders->order_no.' Confirmed');
    }
}
