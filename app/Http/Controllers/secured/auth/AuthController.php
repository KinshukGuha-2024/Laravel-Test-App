<?php

namespace App\Http\Controllers\secured\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login_authorize(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = UsersModel::where('user_id', $request['user_id'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Invalid Credentials']);
        }
    
        $remember_me = $request->has('customCheck') ? true : false;
    
        // Store session data
        session()->regenerate();
        session(['user_name' => $user->user_name]);
        session(['user_id' => $user->user_id]);
        session(['email' => $user->email]);
        // Handle "Remember Me" functionality
        if ($remember_me) {
            session(['remember_me' => 1]);
            config(['session.lifetime' => 43200]); // Set session lifetime to 30 days
        } else {
            session(['remember_me' => 0]);
            config(['session.lifetime' => 120]); // Set session lifetime to 2 hours
        }
    
        // Redirect to the dashboard
        return redirect()->route('secured.dashboard')->with([
            'status' => 'Login successful',
            'user_name' => $user->user_name,
        ]);
    }
    

    public function logout() {
        Session::flush();
        return redirect()->route('auth.login')->with([
            "status" => "You Have Logged Out Successfully"
        ]);
    }

    // public function save_admin() {
    //     $admin = new UsersModel();
    //     $admin->user_name = 'Kinshuk Guha';
    //     $admin->user_id = 'kinshuk@admin123';
    //     $admin->password = Hash::make('kinshuk@2002'); // Encrypt the password
    //     $admin->email = 'kinshukguhadev.2024@gmail.com';
    //     $admin->mobile_number = '1234567890';
    //     $admin->save();

    //     return response()->json(['message' => 'Admin saved successfully!', 'admin' => $admin], 200);
    // }
}
