<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardControllerApi extends Controller
{
    public function addCard(Request $request)
    {
        $request->validate([
            'paypalMail' => ['required', 'email'],
            'type' => ['required'],
            'code' => ['required', 'min:16', 'max:16'],
            'value' => ['required', 'numeric']
        ]);

        $user = User::find(Auth::id());
        $user_id = $user->id;

        $card = Card::create([
            'emailPaypal' => $request->paypalMail,
            'type' => $request->type,
            'code' => $request->code,
            'value' => $request->value,
            'user_id' => $user_id,
        ]);

        // Send response
        $response = [
            'error' => false,
            'message' => "Succes",
            'card' => $card,
        ];

        return response($response, 201);
    }

    public function getCard(Request $request)
    {
        $user = User::find(Auth::id());
        if ($request->query()) {
            $cards = Card::where('user_id', $user->id)
                ->where('value', $request->query('value'))
                ->orWhere('id', $request->query('id'))
                ->orWhere('status', $request->query('status'))
                ->get();
        } else {
            $cards = Card::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        }

        $response = [
            'error' => false,
            'message' => "Succes",
            'card' => $cards,
        ];

        return response($response, 200);
    }

    public function filter(Request $request)
    {
        $user = User::find(Auth::id());
        $cards = Card::where('user_id', $user->id)
            ->where('value', $request->query('value'))
            ->orWhere('id', $request->query('id'))
            ->orWhere('status', $request->query('status'))
            ->get();

        $response = [
            'error' => false,
            'message' => "Succes",
            'card' => $cards,
        ];

        return response($response, 200);
    }
}
