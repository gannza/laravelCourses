<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeApiController extends Controller
{
    //
    public function index(){
      
        $data=[
                    'name'=>'Ganza'
                
            ];
        return response()->json(['users' =>[$data] ], 200); 
    }
}
