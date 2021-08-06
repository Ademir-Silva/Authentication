<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller{

    function accessLogin(){
        return view('auth.login');
    }

    function accessRegister(){
        return view('auth.register');
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:60',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:5|max:32'
        ]);

        $admin = new Admin;

        $admin->type = 2;
        $admin->active = true;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'New user has been successfuly added to database!');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }

    }
    
    /* function autenticate(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:5|max:32'
        ]);

    } */
}
