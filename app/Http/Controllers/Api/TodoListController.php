<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TodoListRequest;
use App\Services\TodoListService;

class TodoListController extends Controller
{
    protected TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->todoListService->all()
        ]);
    }

    public function store(TodoListRequest $request)
    {
        return response()->json([
            'data' => $this->todoListService->store($request->toArray())
        ]);
    }

    public function show(string $id)
    {
        return response()->json([
            'data' => $this->todoListService->findById($id)
        ]);
    }

    public function update(TodoListRequest $request, string $id)
    {
        return response()->json([
            'data' => $this->todoListService->update($id, (array) $request)
        ]);
    }

    public function destroy(string $id)
    {
        return response()->json([
            'data' => $this->todoListService->delete($id)
        ]);
    }
}
