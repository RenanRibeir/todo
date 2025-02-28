<?php

namespace App\Repositories;

use App\Models\TodoList;

class TodoListRepository extends Repository
{
  public function __construct()
  {
    parent::__construct(new TodoList());
  }
}
