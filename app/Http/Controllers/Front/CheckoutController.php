<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail;
    public function index(){
        return view('frontend.checkout.index');
    }

    public function newOrder(Request $request)
    {
        return $request;

        $this->customer = new Customer();
        $this->customer->name   = $request->name;
        $this->customer->email  = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = bcrypt($request->mobile);
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->order_total       = 0;
        $this->order->tax_total         = 0;
        $this->order->shipping_total    = 0;
        $this->order->order_date        = date('Y-m-d');
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->delivery_address  = $request->delivery_address;
        $this->order->payment_method    = $request->payment_method;
        $this->order->save();


    }
}
