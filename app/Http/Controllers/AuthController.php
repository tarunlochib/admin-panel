<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;
use Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
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
            'employee_id' => 'required',
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
            'employee_id'=>$inputs['employee_id'],
            'email'=>$inputs['email'],
            'password'=>Hash::make($inputs['password']),
        ]);

        // Log the user in 
        auth()->login($user);

        return redirect('/')->with('success', 'your account has been created');
    }


    
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye!');
    }

    public function showloginPage()
    {
        return view('sessions.create');
    }

    public function login()
    {   
        $inputs = request()->all();
        // validate the request here

        $validator = Validator::make($inputs,[
            'email' => 'required|email',
            'password' => 'required'  
        ]);

        

        if($validator->fails())
        {
            return response()->json([
                'code' => 422,
                'data' => [],
                'errors' => $validator->errors()->messages()
            ]);
        }

        $user = User::where('email', $inputs['email'])->first();

        if(!$user)
        {
            return response()->json([
                'code' => 400,
                'data' => [],
                'errors' => 'Invalid credentials'
            ]);
        }

        // attempt to authenticate and login user based on the provided credentials 
        if(Hash::check($inputs['password'], $user->password))
        {
            $token = $user->createToken('authToken')->accessToken;

            return response()->json([
                'code' => 200,
                'data' => ['user' => $user, 'access_token' => $token],
                'errors' => []
            ]);

            // redirect with a success flash message

        } 
        else 
        {
            return response()->json([
                'code' => 400,
                'data' => [],
                'errors' => 'Invalid credentials'
            ]);
        }

    }
}
