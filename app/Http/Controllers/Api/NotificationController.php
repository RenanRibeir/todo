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

    /**
     * Get a list of notifications.
     */
    public function index()
    {
        return response()->json([
            'data' =>  $this->notificationService->all()
        ]);
    }

    /**
     * Create a new notification.
     */
    public function store(NotificationRequest $request)
    {
        return response()->json([
            'data' =>  $this->notificationService->store($request->toArray())
        ]);
    }

    /**
     * Get a notification by ID.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' =>  new NotificationResource($this->notificationService->findById($id))
        ]);
    }

    /**
     * Update an existing notification.
     */
    public function update(NotificationRequest $request, string $id)
    {
        return response()->json([
            'data' =>  $this->notificationService->update($id, $request->toArray())
        ]);
    }

    /**
     * Delete a notification.
     */
    public function destroy(string $id)
    {
        return response()->json([
            'data' =>  $this->notificationService->delete($id)
        ]);
    }
}
