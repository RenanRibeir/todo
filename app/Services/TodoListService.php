<?php

namespace App\Services;

use App\DTOs\TodoListDTO;
use App\Models\TodoList;
use App\Repositories\TodoListRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TodoListService extends CachedService
{
  public function __construct(TodoListRepository $repository)
  {
    parent::__construct($repository, 'todo_lists', 60);
  }

  //TODO: turn array into DTO class
  public function store(array $data): TodoList
  {
    $userId = Auth::user()->id;
    $todoListDTO = new TodoListDTO($data['title'], $userId);
    return parent::store((array) $todoListDTO);
  }
}
