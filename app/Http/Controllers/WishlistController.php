<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Resources\WishlistResouce;
use App\Http\Requests\StoreWishlistRequest;

class WishlistController extends Controller
{
    public function store(StoreWishlistRequest $request) {
        
        $userId = auth()->user()->id;

        $wishlistItem = $this->checkWithlistItem($userId, $request->product_id);

        if ($wishlistItem) {
            $this->deleteWishlist($wishlistItem);
            return $this->getAll("The product remmove form wishlist successfly");
        }else {
            $this->create($userId, $request->product_id);
            return $this->getAll("The product added to wishlish successfly");
        }
    }

    // Check if the item already exists in the cart
    public function checkWithlistItem($userId, $productId) {
        return Wishlist::where('customer_id', $userId)
        ->where('product_id', $productId)
        ->first();
    }

    public function deleteWishlist($wihslisht) {
        $wihslisht->delete();
    }

    public function create($userId, $productId) {
        Wishlist::create([
            'customer_id' => $userId,
            'product_id' => $productId
        ]);
    }


    public function getAll($message) {
        $wishlists =  Wishlist::with('product')->where('customer_id', auth()->user()->id)->get();
        return $this->getSuccessResponse($message, WishlistResouce::collection($wishlists),100);
    }
    public function index() {
        return $this->getAll("the data return successfly");
    }
}
