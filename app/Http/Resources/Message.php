<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'convo_id' => $this->conversation_id,
            'content' => $this->content,
            'sender' => [
                'name' => $this->sender->name,
                'email' => $this->sender->email
            ]
        ];
    }
}
