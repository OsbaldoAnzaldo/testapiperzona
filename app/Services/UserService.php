<?php

namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function createUSer($name, $email, $password){
        return $this->userRepository->create($name, $email, $password);
    }
}