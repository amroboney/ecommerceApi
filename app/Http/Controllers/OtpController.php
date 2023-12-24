<?php

namespace App\Http\Controllers;

use App\Http\Classes\SmsController;
use App\Http\Controllers\Controller;


class OtpController extends Controller
{
    public function sendSmsCode($phone,$otp)
    {
        $message =   __('alert.message-code').$otp;  
        
        $msg = str_replace(' ', '%20', $message);
        
        return (new SmsController($phone , $msg))->sendSmsCode();
    }
}
