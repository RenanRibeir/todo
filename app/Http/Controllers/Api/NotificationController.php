<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Services\NotificationService;

/**
 * @group Notifications
 *
 * Endpoints for managing notifications.
 */
class NotificationController extends Controller
{
    protected NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        return response()->json([
            'data' =>  $this->notificationService->all()
        ]);
    }


    public function store(NotificationRequest $request)
    {
        return response()->json([
            'data' =>  $this->notificationService->store($request->toArray())
        ]);
    }

    public function show(string $id)
    {
        return response()->json([
            'data' =>  new NotificationResource($this->notificationService->findById($id))
        ]);
    }

    public function update(NotificationRequest $request, string $id)
    {
        return response()->json([
            'data' =>  $this->notificationService->update($id, $request->toArray())
        ]);
    }

    public function destroy(string $id)
    {
        return response()->json([
            'data' =>  $this->notificationService->delete($id)
        ]);
    }
}
