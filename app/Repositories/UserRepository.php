<?php

namespace App\Repositories;
use App\Models\User;

class UserRepository
{
    public function create($name, $email, $password){
        $User = new User();
        $User->name = $name;
        $User->email = $email;
        $User->password = $password;
        $User->save();
        return $User;
    }
}
