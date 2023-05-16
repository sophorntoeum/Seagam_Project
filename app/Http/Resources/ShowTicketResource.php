<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'zone'=>$this->zone,
            'price'=>$this->price,
            'date'=>$this->date,
            'description'=>$this->description,
            'stadium'=>$this->stadium,
            'create_by_id'=>$this->user,
            // 'ticket'=>$this->tickets,  
        ];
    }
}
