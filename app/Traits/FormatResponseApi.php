<?php

namespace App\Traits;
/**
 * 
 */
trait FormatResponseApi
{
    
    public function success($message,$data,$error,$statusCode=200,$isSuccess=true){
        return $this->coreResponse($message,$data,$error,$statusCode,$isSuccess);
    }

    public function error($message,$error,$statusCode=500,$isSuccess=false){
        return $this->coreResponse($message,null,$error,$statusCode,$isSuccess);
    }

    public function coreResponse($message,$data = null,$error, $statusCode=200, $isSuccess = true)
    {
        // Check the params
        if(!$message) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => $error,
                'code' => $statusCode,
                'results' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => $error,
                'code' => $statusCode,
            ], $statusCode);
        }
    }
}
