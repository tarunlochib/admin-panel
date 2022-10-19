<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use Validator;


class EmployeeController extends Controller
{
    public function create()
    {
        return view('form.user');
    }

    public function store()
    {
        $inputs = request()->all();

        $validator = Validator::make($inputs,[
            'name' => 'required|string|max:255|unique:users,name',
            'employee_id' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required',
            'building_no' => 'required',
            'street_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'code' => 422,
                'data' => [],
                'errors'=> $validator->errors()->messages()
            ]);
        }

        $user = User::create([
            'name' => $inputs['name'],
            'employee_id' => $inputs['employee_id'],
            'email' => $inputs['email'],
            'password' => $inputs['password']
        ]);

        UserAddress::create([
            'user_id' => $user->id,
            'building_no' => $inputs['building_no'],
            'street_name' => $inputs['street_name'],
            'city' => $inputs['city'],
            'state' => $inputs['state'],
            'country' => $inputs['country'],
            'pincode' => $inputs['pincode']
        ]);

        return redirect('/')->with('success', 'user added successfully');
    }
}
