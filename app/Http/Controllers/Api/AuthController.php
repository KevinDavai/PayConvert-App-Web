<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Images;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken("myapptoken")->plainTextToken;

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken("myapptoken")->plainTextToken;

        $response = [
            'error' => false,
            'message' => "Succes",
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function logout(Request $request)
    {

        /** @var \App\Models\User */
        $currentUser = Auth::user();

        $currentUser->tokens()->delete();

        return [
            'message' => 'Logged out Succesfully'
        ];
    }

    public function uploadImg(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'file'  => 'required|mimes:png,jpg|max:2048',
        ]);


        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->store('public/documents');

            //store your file into database
            $image = new Images();
            $image->path = $file;
            $image->user_id = $request->user_id;
            $image->save();

            $response = [
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ];

            return response($response, 201);
        }
    }
}
