<?php

namespace App\Repositories;

use App\Models\Collaborator;

class CollaboratorRepository extends Repository
{
  public function __construct()
  {
    parent::__construct(new Collaborator());
  }
}
