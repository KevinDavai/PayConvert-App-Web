<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Nette\Utils\Json;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Dashboard');
    }

    public function profil_setting()
    {
        return Inertia::render('Users/Profil');
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
            'name' => ['required', 'string', 'min:3', 'max:20', 'unique:users'],
        ]);

        $user = User::find(Auth::id());
        $user->name = request()->input('name');
        $user->save();

        return back()->with([
            'pseudo_changed' => $request->name
        ]);
        //return view('profile', array('user' => Auth::user()));
    }
}
