<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailChangeNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:20', 'unique:users,username'],
            'emailRegister' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'passwordRegister' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        switch ($request->socialiteType) {
            case 'google':
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->emailRegister,
                    'password' => Hash::make($request->passwordRegister),
                    'google_id' => $request->idGoogle,
                    'google_name' => $request->usernameGoogle,
                ]);
                break;
            case 'Github':
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->emailRegister,
                    'password' => Hash::make($request->passwordRegister),
                    'github_id' => $request->idGithub,
                    'github_name' => $request->usernameGithub,
                ]);
                break;
            default:
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->emailRegister,
                    'password' => Hash::make($request->passwordRegister),
                ]);
                break;
        }

        event(new Registered($user));

        $token = $user->createToken('myapp');

        Auth::login($user);

        $request->user()->sendEmailVerificationNotification();

        return redirect(RouteServiceProvider::HOME);
    }
}
