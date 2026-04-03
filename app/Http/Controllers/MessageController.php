<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function destroy($id)
{
    $message = \App\Models\Message::findOrFail($id);
    $message->delete();

    return redirect()->back()->with('success', 'Message deleted successfully.');
}

}
