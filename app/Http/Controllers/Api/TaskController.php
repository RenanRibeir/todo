<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;

/**
 * @group Task
 *
 * Endpoints for managing tasks in a Todo List.
 */
class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Get a list of tasks.
     * @header Authorization string required Bearer token for authentication. Example: "Bearer YOUR_ACCESS_TOKEN"
     * @authenticated
     * @response 200 {
     *   "success": true,
     *   "message": "Tasks fetched successfully",
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Task 1",
     *       "description": "Description of task 1",
     *       "status": "completed",
     *       "deadline": "2025-03-01"
     *     },
     *     {
     *       "id": 2,
     *       "title": "Task 2",
     *       "description": "Description of task 2",
     *       "status": "pending",
     *       "deadline": "2025-03-10"
     *     }
     *   ]
     * }
     */
    public function index()
    {
        return response()->json([
            'data' =>  $this->taskService->all()
        ]);
    }

    /**
     * Create a new task.
     *
     * @bodyParam todo_list_id int required The ID of the todo list. Example: 1
     * @bodyParam title string required The title of the task. Example: "Task 1"
     * @bodyParam description string nullable The description of the task. Example: "Description of task 1"
     * @bodyParam is_completed boolean The completion status of the task. Example: false
     * @bodyParam deadline string nullable The deadline for the task in YYYY-MM-DD format. Example: "2025-03-01"
     * @response 201 {
     *   "success": true,
     *   "message": "Task created successfully",
     *   "data": {
     *     "id": 1,
     *     "todo_list_id": 1,
     *     "title": "Task 1",
     *     "description": "Description of task 1",
     *     "is_completed": false,
     *     "deadline": "2025-03-01"
     *   }
     * }
     */
    public function store(TaskRequest $request)
    {
        return response()->json([
            'data' =>  $this->taskService->store($request->toArray())
        ]);
    }

    /**
     * Get a task by ID.
     *
     * @urlParam id int required The ID of the task. Example: 1
     * @response 200 {
     *   "success": true,
     *   "message": "Task fetched successfully",
     *   "data": {
     *     "id": 1,
     *     "todo_list_id": 1,
     *     "title": "Task 1",
     *     "description": "Description of task 1",
     *     "is_completed": false,
     *     "deadline": "2025-03-01"
     *   }
     * }
     */
    public function show(string $id)
    {
        return response()->json([
            'data' =>  new TaskResource($this->taskService->findById($id))
        ]);
    }

    /**
     * Update an existing task.
     *
     * @bodyParam todo_list_id int required The ID of the todo list. Example: 1
     * @bodyParam title string required The title of the task. Example: "Updated Task"
     * @bodyParam description string nullable The description of the task. Example: "Updated description"
     * @bodyParam is_completed boolean The completion status of the task. Example: true
     * @bodyParam deadline string nullable The deadline for the task in YYYY-MM-DD format. Example: "2025-03-15"
     * @response 200 {
     *   "success": true,
     *   "message": "Task updated successfully",
     *   "data": {
     *     "id": 1,
     *     "todo_list_id": 1,
     *     "title": "Updated Task",
     *     "description": "Updated description",
     *     "is_completed": true,
     *     "deadline": "2025-03-15"
     *   }
     * }
     */
    public function update(TaskRequest $request, string $id)
    {
        return response()->json([
            'data' =>  $this->taskService->update($id, $request->toArray())
        ]);
    }

    /**
     * Delete a task.
     *
     * @urlParam id int required The ID of the task. Example: 1
     * @response 200 {
     *   "success": true,
     *   "message": "Task deleted successfully"
     * }
     */
    public function destroy(string $id)
    {
        return response()->json([
            'data' =>  $this->taskService->delete($id)
        ]);
    }
}
