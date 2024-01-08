<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;


class SliderController extends Controller
{
    private $folderName = "sliders";
    public function index() {
        return $this->getSuccessResponse("data return successfly", SliderResource::collection($this->getActive()),100);
    }


    public function getActive() {
        return Slider::where("status", true)->get()->map(function($slide) {
            $slide->image = ($slide->image)?config('app.url'). $this->folderName .'/'. $slide->image: null;
            return $slide;
        });
    }
}
