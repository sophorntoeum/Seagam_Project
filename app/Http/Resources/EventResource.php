<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'date'=>$this->date,
            'name'=>$this->name,
            'description'=>$this->description,
            'stadium'=>$this->stadium,
            'create_by_id'=>$this->user_id,
            'ticket'=>$this->tickets,
            
        ];
    }
}
