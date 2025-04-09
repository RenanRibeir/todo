<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;

/**
 * @group Search
 *
 * Endpoints for searchs.
 */
class ScoutController extends Controller
{
    /**
     * Search for todos based on a query.
     */
    public function searchTodos(Request $request)
    {
        $query = $request->input('q');
        return TodoList::search($query)->get();
    }

    /**
     * Search for tasks based on a query.
     */
    public function searchTasks(Request $request)
    {
        $query = $request->input('q');
        return Task::search($query)->get();
    }
}
