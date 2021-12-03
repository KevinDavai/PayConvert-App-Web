<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Nette\Utils\Json;
use Illuminate\Http\Request;
use App\Rules\AtLeastOneNumber;
use App\Rules\MatchOldPassword;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Dashboard');
    }

    public function profil_convertir()
    {
        return Inertia::render('Users/Convertir');
    }

    public function profil_setting()
    {
        return Inertia::render('Users/Profil');
    }

    public function profil_integration()
    {
        return Inertia::render('Users/Integration');
    }

    public function update_avatar(Request $request)
    {

        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('storage/upload/avatars/' . $filename));

            $user = User::find(Auth::id());
            $user->avatar = $filename;
            $user->save();
        }

        return back();

        //return view('profile', array('user' => Auth::user()));
    }

    public function update_email(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $user = User::find(Auth::id());
        $user->email = request()->input('email');
        $user->email_verified_at = NULL;
        $user->save();

        $user->sendEmailVerificationNotification();

        return back()->with([
            'email_changed' => $request->email
        ]);
        //return view('profile', array('user' => Auth::user()));
    }

    public function update_pseudo(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:20', 'unique:users'],
        ]);

        $user = User::find(Auth::id());
        $user->username = request()->input('username');
        $user->save();

        return back()->with([
            'pseudo_changed' => $request->name
        ]);
        //return view('profile', array('user' => Auth::user()));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'currentPassword' => ['required', new MatchOldPassword],
            'newPassword' => ['required', 'min:7', new AtLeastOneNumber],
            'confirmPassword' => ['same:newPassword'],
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make(request()->input('newPassword'));
        $user->save();

        return back()->with([
            'passwordChange' => true,
        ]);
    }

    public function get_userProfil()
    {
        $user = User::find(Auth::id());
        $response = [
            'error' => false,
            'message' => "Succes",
            'user' => $user,
        ];

        return response($response, 200);
    }
}
