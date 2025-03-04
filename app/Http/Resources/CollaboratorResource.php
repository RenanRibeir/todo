<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollaboratorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "user_id" => $this->user_id,
            'todo_list_id' => $this->todo_list_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
