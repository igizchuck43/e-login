<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function login (Request $request) {
        $data = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if(auth()->attempt(['name'=>$data['loginname'], 'password'=>$data['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(){
        auth()->logout();

        return redirect("/");
    }
    public function register (Request $request) {

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:50']
        ]);

        // For Hashing Password
        $data['password'] = bcrypt($data['password']);

        // Creating a user
        $user = User::create($data);

        auth()->login($user);


        // return ('Hello from our controller');
        return redirect('/');
    }
}
