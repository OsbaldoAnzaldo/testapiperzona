<?php

namespace App\Classes;

use Illuminate\Support\Facades\Hash;

class EncryptPassword
{
    static function encrypt($password){
        return  Hash::make($password);
    }
}