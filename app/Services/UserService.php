<?php

namespace App\Services;

use App\Services\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService implements UserRepo
{
    public function getUserDtlByUserId($userName) {
        return DB::table("users")
                    ->where("username", $userName)
                    ->first();
    }   
}