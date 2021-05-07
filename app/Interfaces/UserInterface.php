<?php 

namespace App\Interfaces;

use App\Http\Requests\UserRequest;

interface UserInterface{


    public function getAllUsers();

    public function showUser($id);

    public function requestUser(UserRequest $request, $id = null);

    public function deleteUser($id);

}