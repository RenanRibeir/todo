<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoListRequest;
use App\Services\TodoListService;

/**
 * @group TodoLists
 *
 * Endpoints for managing todo lists.
 */
class TodoListController extends Controller
{
    protected TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    /**
     * List all Todo Lists.
     *
     * This endpoint retrieves a list of all todo lists available.
     *
     * @response 200 {
     *   "success": true,
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Work Tasks"
     *     },
     *     {
     *       "id": 2,
     *       "title": "Personal Tasks"
     *     }
     *   ]
     * }
     * @response 404 {
     *   "success": false,
     *   "message": "No todo lists found"
     * }
     */
    public function index()
    {
        return response()->json([
            'data' => $this->todoListService->all()
        ]);
    }

    /**
     * Create a new Todo List.
     *
     * This endpoint creates a new todo list. The title is required to create a new list.
     *
     * @bodyParam title string required The title of the todo list. Example: "Work Tasks"
     * 
     * @response 201 {
     *   "success": true,
     *   "message": "Todo list created successfully",
     *   "data": {
     *     "id": 1,
     *     "title": "Work Tasks"
     *   }
     * }
     * @response 400 {
     *   "success": false,
     *   "message": "The title field is required."
     * }
     */
    public function store(TodoListRequest $request)
    {
        return response()->json([
            'data' => $this->todoListService->store($request->toArray())
        ]);
    }

    /**
     * Get a single Todo List.
     *
     * This endpoint retrieves the details of a specific todo list by its ID.
     *
     * @response 200 {
     *   "success": true,
     *   "data": {
     *     "id": 1,
     *     "title": "Work Tasks"
     *   }
     * }
     * @response 404 {
     *   "success": false,
     *   "message": "Todo list not found"
     * }
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => $this->todoListService->findById($id)
        ]);
    }

    /**
     * Update a Todo List.
     *
     * This endpoint updates the title of an existing todo list.
     *
     * @bodyParam title string required The title of the todo list. Example: "Personal Tasks"
     * 
     * @response 200 {
     *   "success": true,
     *   "message": "Todo list updated successfully",
     *   "data": {
     *     "id": 1,
     *     "title": "Personal Tasks"
     *   }
     * }
     * @response 400 {
     *   "success": false,
     *   "message": "The title field is required."
     * }
     */
    public function update(TodoListRequest $request, string $id)
    {
        return response()->json([
            'data' => $this->todoListService->update($id, (array) $request)
        ]);
    }

    /**
     * Delete a Todo List.
     *
     * This endpoint deletes an existing todo list by its ID.
     *
     * @response 200 {
     *   "success": true,
     *   "message": "Todo list deleted successfully"
     * }
     * @response 404 {
     *   "success": false,
     *   "message": "Todo list not found"
     * }
     */
    public function destroy(string $id)
    {
        return response()->json([
            'data' => $this->todoListService->delete($id)
        ]);
    }
}
