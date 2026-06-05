<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $chat = Chat::create([
            'sender_id' => $request->user()->id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message
        ]);

        return response()->json($chat);
    }

    public function messages($userId)
    {
        return Chat::where(function ($q) use ($userId) {
            $q->where('sender_id', auth()->id())
            ->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
            ->where('receiver_id', auth()->id());
        })->get();
    }

        public function index(Request $request)
    {
        $query = Property::query();

        if ($request->price) {
            $query->where('price', '<=', $request->price);
        }

        if ($request->location) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        return $query->get();
    }
}
