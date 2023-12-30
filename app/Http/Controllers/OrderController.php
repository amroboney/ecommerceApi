<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResouce;

class OrderController extends Controller
{
    public function getAll($message) {
        $orders =  Order::with('orderDetails')->where('customer_id', auth()->user()->id)->get();
        return $this->getSuccessResponse($message, OrderResouce::collection($orders),100);
    }
    public function index() {
        return $this->getAll("the data return successfly");
    }
}
