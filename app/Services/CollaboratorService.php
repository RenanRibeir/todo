<?php

namespace App\Services;

use App\Repositories\CollaboratorRepository;
use App\Services\Service;

class CollaboratorService extends Service
{
  public function __construct(CollaboratorRepository $repository)
  {
    parent::__construct($repository);
  }
}
