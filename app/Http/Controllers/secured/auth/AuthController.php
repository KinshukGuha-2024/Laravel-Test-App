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

        Session::put('user_name', $user->user_name);
        Session::put('user_id', $user->user_id);
        Session::put('email', $user->email);
        Session::put('remember_me', $request['customCheck']);

        return redirect()->route('secured.dashboard');
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
