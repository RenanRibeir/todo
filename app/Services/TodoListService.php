<?php

namespace App\Services;

use App\DTOs\TodoListDTO;
use App\Models\TodoList;
use App\Repositories\TodoListRepository;

class TodoListService extends Service
{
  public function __construct(TodoListRepository $repository)
  {
    parent::__construct($repository);
  }

  //TODO: turn array into DTO class
  public function store(array $data): TodoList
  {
    //TODO: get user id from auth
    // $userId = Auth::user()->id;
    $todoListDTO = new TodoListDTO($data['title'], 1);

    return $this->repository->create((array) $todoListDTO);
  }
}
