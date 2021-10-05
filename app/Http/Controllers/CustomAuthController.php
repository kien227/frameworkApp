<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }   

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
   
        $credentials = $request->only('username', 'password', 'role');
        if (Auth::attempt($credentials)) {
            if (Auth::user()-> role == 'teacher') {
                return redirect()->intended('dashboard1')
                -> withSuccess('Signed in');
            }else{
                return redirect()->intended('dashboard2')
                -> withSuccess('Signed in');
            }
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard1()
    {
        if(Auth::check()){
            return redirect()->route('users.index1');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }    

    public function dashboard2()
    {
        if(Auth::check()){
            return redirect()->route('users.index2');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }  

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}