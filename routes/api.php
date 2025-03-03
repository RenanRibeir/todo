<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TasksController;
use App\Http\Controllers\Api\TodoListController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/todo-list/', [TodoListController::class, 'index']);
  Route::post('/todo-list/store', [TodoListController::class, 'store']);
  Route::get('/todo-list/show/{id}', [TodoListController::class, 'show']);
  Route::put('/todo-list/update/{id}', [TodoListController::class, 'update']);
  Route::delete('/todo-list/destroy/{id}', [TodoListController::class, 'destroy']);

  Route::get('/task/', [TasksController::class, 'index']);
  Route::post('/task/store', [TasksController::class, 'store']);
  Route::get('/task/show/{id}', [TasksController::class, 'show']);
  Route::put('/task/update/{id}', [TasksController::class, 'update']);
  Route::delete('/task/destroy/{id}', [TasksController::class, 'destroy']);
});