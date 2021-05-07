<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * 
 */
trait UserModel
{

    public function createUser($request){
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = preg_replace('/\s+/', '', strtolower($request->email));
        $newUser->password = \Hash::make($request->password);
        $newUser->save();

        DB::commit();
        return $newUser;
    }

    public function updateUser($user,$request){
      
        $user->update($request->all());

        DB::commit();
        return $user;
    }


    public function user($id){  
            return User::find($id);
    }
}