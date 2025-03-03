<?php

namespace App\Repositories;

use App\Models\Tasks;

class TaskRepository extends Repository
{
  public function __construct()
  {
    parent::__construct(new Tasks());
  }
}
