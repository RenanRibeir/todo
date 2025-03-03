<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository extends Repository
{
  public function __construct()
  {
    parent::__construct(new Notification());
  }
}
