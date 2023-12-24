<?php

namespace App\Http\Controllers;

use App\Events\SendOTP;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

class LoginController extends Controller
{
    private $userTypeID = 3;
    private $otp = "" ;
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
}
