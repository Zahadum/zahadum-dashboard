<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ContactFormResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'note' => $this->note,
            'date' => $this->created_at
        ];
    }
}
