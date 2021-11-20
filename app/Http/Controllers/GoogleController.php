<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\RouteServiceProvider;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function handleGoogleCallback()
    {
        
        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->id)->first();

        $userMail = $user->getEmail();
        $userId = $user->getId();

        if($finduser){
     
            Auth::login($finduser);

            return redirect()->intended(RouteServiceProvider::HOME);
            
        } else {
            return redirect('/')->with(['mail' => $userMail, 'google_link' => 5, 'userId' => $userId]);
            dd($user);
        }
    }
}
