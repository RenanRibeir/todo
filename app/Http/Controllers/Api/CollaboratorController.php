<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollaboratorRequest;
use App\Services\CollaboratorService;

/**
 * @group Collaborator
 *
 * Endpoints for managing collaborators.
 */
class CollaboratorController extends Controller
{
    protected CollaboratorService $collaboratorService;

    public function __construct(CollaboratorService $collaboratorService)
    {
        $this->collaboratorService = $collaboratorService;
    }

    /**
     * Get a list of collaborators.
     */
    public function index()
    {
        return response()->json([
            'data' =>  $this->collaboratorService->all()
        ]);
    }

    /**
     * Create a new collaborator.
     */
    public function store(CollaboratorRequest $request)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->store($request->toArray())
        ]);
    }

    /**
     * Get a collaborator by ID.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->findById($id)
        ]);
    }

    /**
     * Update an existing collaborator.
     */
    public function update(CollaboratorRequest $request, string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->update($id, $request->toArray())
        ]);
    }

    /**
     * Delete a collaborator.
     */
    public function destroy(string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->delete($id)
        ]);
    }
}
