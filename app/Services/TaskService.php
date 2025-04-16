<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends CachedService
{
  public function __construct(TaskRepository $repository)
  {
    parent::__construct($repository, 'tasks', 60);
  }
}
