<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }
}
