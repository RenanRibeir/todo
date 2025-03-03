<?php

namespace App\Services;

use App\Models\Notification;
use App\Repositories\NotificationRepository;
use App\Services\Service;
use Illuminate\Support\Facades\Auth;

class NotificationService extends Service
{
  public function __construct(NotificationRepository $repository)
  {
    parent::__construct($repository);
  }
}
