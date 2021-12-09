<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Size;

class CardController extends Controller
{
    public function post(Request $request)
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

        return back()->with([
            'card_status' => 'Send'
        ]);
    }

    public function getAllCardFromUser()
    {
        $user = User::find(Auth::id());
        $cards = Card::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        return response()->json($cards);
    }

    public function getCardStatusFromUser()
    {
        $user = User::find(Auth::id());

        $nbPendingCards =  Card::where('user_id', $user->id)->where('status', 'Pending')->get()->count();

        $nbAcceptedCards = Card::where('user_id', $user->id)->where('status', 'Accepted')->get()->count();

        $nbRefusedCards = Card::where('user_id', $user->id)->where('status', 'Refused')->get()->count();

        $response = [
            'error' => false,
            'message' => "Succes",
            'nbPendingCards' => $nbPendingCards,
            'nbAcceptedCards' => $nbAcceptedCards,
            'nbRefusedCards' => $nbRefusedCards,
        ];

        return response($response, 200);
    }


    public function getMoneyConvertFromUser()
    {
        $user = User::find(Auth::id());

        $AcceptedCards =  Card::where('user_id', $user->id)->where('status', 'Accepted')->get();

        $money = 0;

        foreach ($AcceptedCards as &$card) {
            $money += $card->value;
        }

        $response = [
            'error' => false,
            'message' => "Succes",
            'money' => $money,
        ];

        return response($response, 200);
    }

    public function getAllCards()
    {
        $cards = Card::orderBy('created_at', 'desc')->get();
        return response()->json($cards);
    }
}
