<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    //
    public function index(Request $request){
     
        return response()->json(['user'=>$request->user()], 200);
    }
    
    public function register(Request $request)
    {
        $data=$request->all();

        $validator = Validator::make($data, [
            'name'=>'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()],422);
        }
      

        $user = User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password'))
         ]);

         $token = $user->createToken(Str::random(6))->accessToken;

         return response()->json(['user'=>$user,'token' => $token], 200);
    }
}

