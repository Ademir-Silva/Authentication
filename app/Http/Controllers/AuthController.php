<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:32',
            'checkPassword' => 'required|min:5|max:32|same:old_password'
        ]);

        $admin = new Admin;

        $admin->type = 2;
        $admin->active = true;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $save = $admin->save();

        if ($save) {
            return back()->with('success', 'O usuário foi cadastrado com sucesso!');
        } else {
            return back()->with('fail', 'Ocorreu um erro, tente novamento mais tarde!');
        }
    }

    function check(Request $request){
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:5|max:32'
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'Este email não está cadastrado!');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect()->route('welcome');
            } else {
                return back()->with('fail', 'A senha está incorreta!');
            }
        }
    }

    public function logout()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect()->route('auth.accessLogin');
        }
    }

    public function accessWelcome()
    {
        $data = ['LoggedUserInfo' => Admin::where('id', '=', session('LoggedUser'))->first()];
        return view('welcome', $data);
    }
}
