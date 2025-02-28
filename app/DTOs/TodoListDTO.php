<?php

namespace App\DTOs;

class TodoListDTO
{
  public string $title;
  public int $owner_id;

  public function __construct(string $title, int $owner_id)
  {
    $this->title = $title;
    $this->owner_id = $owner_id;
  }
}
