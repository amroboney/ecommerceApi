<?php

namespace App\Http\Classes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Classes\CurlController;

class SmsController extends Controller
{
    public $phone;
    public $otp;
    public $message;
    private $url;
    private $api_key;
    private $sender;
    

    public function __construct($phone, $message)
    {
        $this->phone      = $phone;
        $this->otp        = $message;
        $this->url        = config('keysconfig.sms_url');
        $this->api_key    = config('keysconfig.sms_api_key');
        $this->sender     = config('keysconfig.sms_sender');
        $this->message    = $message;
    }

    //check phone local or global and send
    public function send()
    {
        $prefix = substr($this->phone, 0, 3);
        if ($prefix == 249) {
            return $this->sendLocalSms();
        }
        return $this->sendGlobalSms();
    }

    // send local sms
    /**
     * send sma message by token to login in app
     *
     * @return message_status
     */
    public function sendSmsCode()
    {
        $url_send =$this->url."&api_key=".$this->api_key."&to=".$this->phone ."&from=".$this->sender."&sms=".$this->message."&unicode=1";
        
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $url_send, []);
        return json_decode($res->getBody());
    }

    // send global smsm
    public function sendGlobalSms()
    {
        $smsUrl = config('sms.global_url').'?app=ws&u='.config('sms.global_user').'&h=681106d60e02368abe4e29be068c1b30&op=pv&to='.$this->phone.'&msg='.$this->message;
        return 'global';
    }

    
}
