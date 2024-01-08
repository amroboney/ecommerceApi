<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResouce;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    private $initalStatus = 'pendding';
    public function getAll($message) {
        $orders =  Order::with('orderItems')->where('customer_id', auth()->user()->id)->get();
        return $this->getSuccessResponse($message, OrderResouce::collection($orders),100);
    }
    public function index() {
        return $this->getAll("the data return successfly");
    }

    public function store(StoreOrderRequest $request){

       $order = Order::create([
        'serial' => $this->generateSerial(),
        'status' => $this->initalStatus,
        'customer_id' => auth()->user()->id,
        'date' => Carbon::now()
       ]);

       $order->order

    }

    public function generateSerial() {
        return 'ORD-' . str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
    }
}
