<?php
namespace App\Validation;

use Illuminate\Support\Facades\Validator;

Trait RegisterRequest 
{
    public function registerDataSanitization($data)
    {
        $validator = Validator::make($data, [
            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|numeric',
            'password' => 'required|min:6|confirmed',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return $validator;
    }
     
    public function loginDataSanitization($data)
    {
        $validator = Validator::make($data, [    
           'email' => 'required',
           'password' => 'required|min:6',   
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return $validator;
    }
}
