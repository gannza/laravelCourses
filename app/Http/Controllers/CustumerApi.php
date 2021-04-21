<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustumerApi extends Controller
{
    //

 public function sendSimpleSms(){
    $curl = curl_init();
    $formData =[
        "application_id"=> "20274", 
        "application_token"=> "c2l36PvSrM51bRaZmgOiC8LWHnsosBOL7mk35BwA1eJLxsrGfV", 
        "number"=> "0781945189", 
        "text"=> "test_sms", 
        "country"=> "rw"
    ];
    curl_setopt_array($curl, array(
    CURLOPT_URL =>"https://portal.bulkgate.com/api/1.0/simple/transactional",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode( $formData ,true),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Cache-Control: no-cache"
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $jsonResponse = json_decode($response,true);
    \Log::info($jsonResponse);
    return $jsonResponse;
 }
}
