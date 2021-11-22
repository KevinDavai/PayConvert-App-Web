<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function redirectToLogin()
    {
        //config(['services.Github.redirect' => env('Github_REDIRECT')]);
        switch (Route::current()->getName()) {
            case 'loginGithub':
                return Socialite::driver('Github')->with(['state' => 'type=login'])->redirect();
                break;
            case 'link':
                return Socialite::driver('Github')->with(['state' => 'type=link'])->redirect();
                break;
        }
    }

    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function handleGithubLoginCallback(Request $request)
    {

        $state = $request->input('state');
        parse_str($state, $result);
        $user = Socialite::driver('github')->stateless()->user();

        $type = $result['type'];

        switch ($type) {
            case 'login':
                $finduser = User::where('Github_id', $user->id)->first();


                $userMail = $user->getEmail();
                $userId = $user->getId();
                $usernameGithub = $user->getName();                

                if ($finduser) {

                    Auth::login($finduser);

                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect('/')->with(['mail' => $userMail, 'github_link' => 5, 'userId' => $userId, 'socialiteType' => 'Github', 'usernameGithub' => $usernameGithub]);
                }

                break;
            case 'link':
                dd("add for link");
                break;
        }
    }
}
