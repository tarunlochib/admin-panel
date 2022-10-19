<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAddress;
use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        // dd($user->userAddress->formatted_address);
        // $userAddresses = UserAddress::all();
        return view('welcome', compact('users'));
    }
}
