<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\SendOTP;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\verifyRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\LoginResource;

class LoginController extends Controller
{
    private $userTypeID = 3;
    private $otp = "" ;
    private $folderName = "images";
    public function __construct(){
        $this->otp = rand(1000,9999);
    }

    function login(LoginRequest $request)  {
        
        $user = User::updateOrCreate(
            ['phone' => $request->phone],
            ['user_type_id' => $this->userTypeID, 'otp' => $this->otp]
        );

        event(new SendOTP($user));

        return $this->getSuccessResponse("The user created successfly", new LoginResource($user), 100);
    }

    public function verify(verifyRequest $request) {
        if($this->checkOtp($request->phone, $request->otp)){
            $user = $this->getUser($request->phone);
            $user->image = ($user->image)?config('app.url'). $this->folderName .'/'. $user->image: null;
            $user->token = 'Bearer '.$user->createToken('user')->plainTextToken;
            return $this->getSuccessResponse("The user created successfly",new UserResource($user) ,100);
        }
        return $this->getErrorResponse('mismatch data',["name"=> ""], 102);
    }   

    public function checkOtp($phone, $otp) {
        return User::where('phone', $phone)->where('otp', $otp)->exists();
    }

    public function getUser($phone) {
        return User::where('phone', $phone)->first();
    }
}
