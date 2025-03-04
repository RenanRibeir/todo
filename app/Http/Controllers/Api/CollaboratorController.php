<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollaboratorRequest;
use App\Services\CollaboratorService;

/**
 * @group Collaborator
 *
 * Endpoints for managing tasks in a Todo List.
 */
class CollaboratorController extends Controller
{
    protected CollaboratorService $collaboratorService;

    public function __construct(CollaboratorService $collaboratorService)
    {
        $this->collaboratorService = $collaboratorService;
    }

    public function index()
    {
        return response()->json([
            'data' =>  $this->collaboratorService->all()
        ]);
    }


    public function store(CollaboratorRequest $request)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->store($request->toArray())
        ]);
    }

    public function show(string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->findById($id)
        ]);
    }

    public function update(CollaboratorRequest $request, string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->update($id, $request->toArray())
        ]);
    }

    public function destroy(string $id)
    {
        return response()->json([
            'data' =>  $this->collaboratorService->delete($id)
        ]);
    }
}
