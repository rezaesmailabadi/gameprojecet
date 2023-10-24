<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(Request $request)
    {


        $data = $request->all();
        // dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        $token = $user->createToken('auth_token')->plainTextToken;
<<<<<<< HEAD

=======
        $cookie = cookie('token', $token, 60 * 24); 
        
>>>>>>> a8a7c347e5f8694e85ce41cc6e96137a8274784d
        return response()->json([
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }






    public function login(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Email or password is incorrect!'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

<<<<<<< HEAD
=======
        $cookie = cookie('token', $token, 60 * 24); 

>>>>>>> a8a7c347e5f8694e85ce41cc6e96137a8274784d
        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }


    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

}
