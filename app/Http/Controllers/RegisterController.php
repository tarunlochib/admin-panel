<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {   

        $inputs = request()->all();
        // dd($inputs);
    //    Validate
        $validator = Validator::make($inputs, [
            'name' => 'required|string|max:255|unique:users,name',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required'
        ]);

        // if not validated return response with error message\
        // dd($inputs);
        if($validator->fails())
        {
            return response()->json([
                'code' => 422,
                'data' => [],
                'errors' => $validator->errors()->messages()
            ]);
        }
        
        $user = User::create([
            'name'=>$inputs['name'],
            'email'=>$inputs['email'],
            'password'=>Hash::make($inputs['password']),
        ]);


        return redirect('/')->with('success', 'your account has been created');
    }
}
