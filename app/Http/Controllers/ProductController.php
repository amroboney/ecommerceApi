<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $folderName = 'images';
    public function getAllActiveProducts() {
        return ProductResource::collection($this->getActive());
    }

    public function  getActive() {
        return Product::where('status', true)->with('category','unit', 'brand')->orderBy('created_at', 'asc')->get()->map(function($product){
            $product->image = ($product->image)?config('app.url'). $this->folderName .'/'. $product->image: null;
            return $product;
        });
    }

    public function speicals() {
        return ProductResource::collection($this->getActive()->where('special', true)) ;
    }

    public function news() {
        return ProductResource::collection($this->getActive()->take(10)) ;
    }
}
