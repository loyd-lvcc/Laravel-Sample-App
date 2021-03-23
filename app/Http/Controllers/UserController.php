<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Log;

class UserController extends Controller
{
    public function login(Request $request) {
        $email = $request->get('email');
        $password = $request->get('password'); // secret123

        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            $user->token = Hash::make($user->email . date('Y/m/d'));
            $user->save();
            
            return response()->json(['data' => $user]);
        }

        return response()->json(['error' => 'Invalid credentials'], 403);
    }

    public function signup(Request $request) {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        // validation for user input
        if (!$name || !$password || !$email) {
            return response()->json(['error' => 'Name, Email and Password are required.']);
        }

        // check if email is already exists
        $emailExists = User::where('email', $email)->first();
        if ($emailExists) {
            return response()->json(['error' => 'Email already exists']);
        }

        // create user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        // send email

        return response()->json(['data' => $user]);
    }
}
