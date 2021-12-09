<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function redirectToLogin()
    {
        //config(['services.google.redirect' => env('GOOGLE_REDIRECT')]);
        switch (Route::current()->getName()) {
            case 'loginGoogle':
                return Socialite::driver('google')->with(['state' => 'type=login'])->redirect();
                break;
            case 'link':
                return Socialite::driver('google')->with(['state' => 'type=link'])->redirect();
                break;
        }
    }

    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function handleGoogleLoginCallback(Request $request)
    {

        $state = $request->input('state');
        parse_str($state, $result);
        $user = Socialite::driver('google')->stateless()->user();

        $type = $result['type'];

        switch ($type) {
            case 'login':
                dd("salut");
                $finduser = User::where('google_id', $user->id)->first();

                $userMail = $user->getEmail();
                $userId = $user->getId();
                $usernameGoogle = $user->getName();

                if ($finduser) {

                    Auth::login($finduser);

                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect('/')->with(['mail' => $userMail, 'google_link' => 5, 'userId' => $userId, 'socialiteType' => 'google', 'usernameGoogle' => $usernameGoogle]);
                }

                break;
            case 'link':
                dd("add for link");
                break;
        }
    }
}
