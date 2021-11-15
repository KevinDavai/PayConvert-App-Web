<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Facades\Image;

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

        //return view('profile', array('user' => Auth::user()));
    }
}
