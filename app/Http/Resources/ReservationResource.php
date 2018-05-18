<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReservationResource extends Resource
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
            'avatar' => $this->avatar,
            'email' => $this->email,
            'phone' => $this->phone,
            'people' => $this->people,
            'note' => $this->note,
            'datetime' => $this->datetime,
            'date' => $this->created_at
        ];
    }
}
