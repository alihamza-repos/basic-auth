<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected function signup(Request $request)
    {
        $validUser = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
            'password' => ['required', 'string', 'min:3'],
        ]);

        if ($validUser->fails()) {
            return response()->json([
                'status'=> false,
                'message' => 'Validation failed',
                'error' => $validUser->errors()->all(),
            ], 401);
        }

        if (isset($request->image)) {
            // Get the original filename
            $originalName = $request->image->getClientOriginalName();

            // Sanitize the filename by replacing spaces with dashes
            $sanitizedName = str_replace(' ', '-', $originalName);

            // Construct the full URL for the image
            $imageUrl = 'profile/' . $sanitizedName; // This is the path to store in the database

        } else {
            // Default image or null
            $imageUrl = null;
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageUrl, // Store the image path in the database
        ]);
        return response()->json([
           'status'=> true,
           'message' => 'User created successfully',
            'user' => $user
        ], 200);

    }

    public function login(Request $request){
        $validUser = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($validUser->fails()) {
            return response()->json([
                'status'=> false,
                'message' => 'Authentication failed',
                'error' => $validUser->errors()->all(),
            ], 404);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return response()->json([
                'status'=> true,
                'message' => 'Login successful',
                'token' => Auth::user()->createToken('API Token')->plainTextToken,
                'token-type' => 'bearer',
            ], 200);
        } else{
            return response()->json([
                'status'=> false,
                'message' => 'Email or password incorrect',
                'error' => $validUser->errors()->all(),
            ], 401);
        }


    }

    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status'=> true,
            'user' => $user,
            'message' => 'Logout  successful',
        ], 200);


    }


}
