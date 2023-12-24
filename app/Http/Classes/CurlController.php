<?php

namespace App\Http\Classes;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurlController extends Controller
{
    //get data
    static function getData($url)
    {
        try {
            $headers = array(
                'Content-Type:application/json; charset=UTF-8'
            );
            $ch = curl_init( $url );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_HTTPGET, 0);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_TIMEOUT, 80);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec( $ch );
            //Check for errors.
            if(curl_errno($ch)){
                //If an error occured, throw an Exception.
                throw new Exception(curl_error($ch));
            }
            $results = json_decode($response, true);
            return ['responseCode' => 100, 'responseMessage' => 'Succuss',  'data' => $results];
        } catch (\Throwable $th) {
            return ['status' => 130, 'msg' => $th];
        }
    }

    // post data
    static function postData($url, $params)
    {
        try {
            $headers = array(
                'Content-Type:application/json; charset=UTF-8'
            );
            
            $payload = json_encode($params);
            $ch = curl_init( $url );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_POST, 0);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_TIMEOUT, 80);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec( $ch );
            //Check for errors.
            if(curl_errno($ch)){
                //If an error occured, throw an Exception.
                throw new Exception(curl_error($ch));
            }
            $results = json_decode($response, true);
            \Log::info($results);
            // return $results;
            return ['responseCode' => 100, 'responseMessage' => 'Succuss', 'data' => $results];
        } catch (\Throwable $th) {
            \Log::info($th);
            return ['status' => 130, $th];
        }
    }
}
