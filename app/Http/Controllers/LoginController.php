<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        if(Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ])){
                $user = Auth::user();
                return redirect('data/mahasiswa');
            }
            else{
                return redirect()->back()->withErrors(['message' => 'User not found'])->withinput();
            }
    }
    
    public function registration(Request $request){
        $user = new \App\Models\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->save();

        return response()->json(["status"=>$user]);
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}