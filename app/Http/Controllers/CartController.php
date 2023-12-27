<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\DeleteCartRequest;

class CartController extends Controller
{
    public function store(StoreCartRequest $request) {
        
        $userId = auth()->user()->id;

        $cartItem = $this->checkCartItem($userId, $request->product_id);

        if ($cartItem) {
            $this->editQuantity($cartItem, $request->quantity);
        }else {
            $this->create($userId, $request->product_id, $request->quantity);
        }
    }

    // Check if the item already exists in the cart
    public function checkCartItem($userId, $productId) {
        return Cart::where('customer_id', $userId)
        ->where('product_id', $productId)
        ->first();
    }

    public function editQuantity($cartItem, $quantity) {
        $cartItem->update(['quantity' => $quantity]);
    }

    public function create($userId, $productId, $quantity) {
        Cart::create([
            'customer_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    public function destroy( $cartId) {
        $cart = Cart::find($cartId);

        if(!$cart) {
            return $this->getSuccessResponse("The cart is not exist", '', 102);
        }

        $cart->delete();

        return $this->getSuccessResponse("The cart delete successfly", '', 100);
    }
}
