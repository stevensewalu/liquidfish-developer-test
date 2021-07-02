<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
        //
        return MessageResource::collection(Message::all());
    }


    public function create()
    {
        //
        return view('contact');
    }


    public function store(MessageRequest $request)
    {
        //
        $message = Message::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        //send notification
        $notification = [
            'id' => $message->id,
            'body' => "You have received a message from the Liquid Fish Test Contact Page"
        ];

        $user = User::first();
        $user->notify(new MessageSent($notification));

        return new MessageResource($message);
    }


    public function show(Message $message)
    {
        //
        return view('message',$message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
