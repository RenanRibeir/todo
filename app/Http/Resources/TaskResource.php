<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'todo_list_id' => $this->todo_list_id,
            'title' => $this->title,
            'description' => $this->description,
            'is_completed' => (bool) $this->is_completed,
            'deadline' => $this->deadline,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
