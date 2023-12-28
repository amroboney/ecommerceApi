<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Reviews;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request) {
        
        $userId = auth()->user()->id;

        $reviewItem = $this->checkReviewItem($userId, $request->product_id);

        if ($reviewItem) {
            $this->editRate($reviewItem, $request->rate);
            return $this->getSuccessResponse("The rate changed successfly", '' ,100);
        }else {
            $this->create($userId, $request->product_id, $request->rate);
            return $this->getSuccessResponse("The rate added successfly", '' ,100);
        }
    }

    // Check if the item already exists in the cart
    public function checkReviewItem($userId, $productId) {
        return Reviews::where('customer_id', $userId)
        ->where('product_id', $productId)
        ->first();
    }

    public function editRate($reviewItem, $rate) {
        $reviewItem->update(['rate' => $rate]);
    }

    public function create($userId, $productId, $rate) {
        Reviews::create([
            'customer_id' => $userId,
            'product_id' => $productId,
            'rate' => $rate,
        ]);
    }
}
