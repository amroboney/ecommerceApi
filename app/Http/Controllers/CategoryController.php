<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResouce;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    private $folderName = 'images';
    public function getAllActiveCategories() {
        return CategoryResouce::collection($this->getActive());
    }

    public function  getActive() {
        return Category::where('status', true)->get()->map(function($category){
            $category->image = ($category->image)?config('app.url'). $this->folderName .'/'. $category->image: null;
            return $category;
        });;
    }
}
