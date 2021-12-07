<?php

namespace App\Http\Controllers\Admin;

use App\Models\Card;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function editCard(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'emailPaypal' => ['required', 'email'],
            'code' => ['required', 'min:16', 'max:16'],
            'value' => ['required', 'numeric'],
            'status' => ['required']
        ]);

        $card = Card::find($request->id);


        $card->status = $request->status;
        $card->save();

        return back()->with([
            'card_edit' => $card
        ]);
    }
}
