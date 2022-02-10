<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Message\CreateRequest;
use App\Http\Requests\Message\ListRequest;
use App\Http\Resources\Message as MessageResource;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(ListRequest $request)
    {
        $messages = Message::where('conversation_id', $request->conversation_id)
            ->latest()
            ->get();

        return MessageResource::collection($messages);
    }

    public function store(CreateRequest $request)
    {
        $conversation = Conversation::findOrFail($request->conversation_id);

        $message = $conversation->messages()->create([
            'user_id' => $request->user()->id,
            'content' => $request->content
        ]);

        broadcast(new MessageSent($message));

        return response()->json(['success' => true]);
    }
}
