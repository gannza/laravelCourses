<?php

namespace App\Repositories;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Traits\FormatResponseApi;
use App\Traits\UserModel;
use Illuminate\Support\Facades\DB;

class UserRepostitory implements UserInterface
{

    use FormatResponseApi;
    use UserModel;

    public function getAllUsers()
    {
        try {
            $users = User::all();
            return $this->success('List of users', $users, false, 200, true);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function showUser($id)
    {
        try {
            $user = $this->user($id);
            if(!$user)  return $this->error('No user found', 404);

            return $this->success('show user',  $this->user($id) , false, 200, true);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = $this->user($id);
            if(!$user)  return $this->error('No user found', 404);
            $user->delete();
            return $this->success('user deleted',   $user , false, 200, true);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    public function requestUser(UserRequest $request, $id = null)
    {
        if ($id) {
            $user = $this->user($id);
            if(!$user)  return $this->error('No user found', 404);

            return $this->success('user updated', $this->updateUser($user,$request), false, 200, true);
        
        } else {
            DB::beginTransaction();
            try {
                return $this->success('user created', $this->createUser($request), false, 200, true);
            } catch (\Exception $e) {
                DB::rollBack();
                return $this->error($e->getMessage(), $e->getCode());
            }
        }
    }
}
