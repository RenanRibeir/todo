<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CollaboratorController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TodoListController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/todo-list/', [TodoListController::class, 'index']);
  Route::post('/todo-list/store', [TodoListController::class, 'store']);
  Route::get('/todo-list/show/{id}', [TodoListController::class, 'show']);
  Route::put('/todo-list/update/{id}', [TodoListController::class, 'update']);
  Route::delete('/todo-list/destroy/{id}', [TodoListController::class, 'destroy']);

  Route::get('/task/', [TaskController::class, 'index']);
  Route::post('/task/store', [TaskController::class, 'store']);
  Route::get('/task/show/{id}', [TaskController::class, 'show']);
  Route::put('/task/update/{id}', [TaskController::class, 'update']);
  Route::delete('/task/destroy/{id}', [TaskController::class, 'destroy']);


  Route::get('/notification/', [NotificationController::class, 'index']);
  Route::post('/notification/store', [NotificationController::class, 'store']);
  Route::get('/notification/show/{id}', [NotificationController::class, 'show']);
  Route::put('/notification/update/{id}', [NotificationController::class, 'update']);
  Route::delete('/notification/destroy/{id}', [NotificationController::class, 'destroy']);

  Route::get('/collaborator/', [CollaboratorController::class, 'index']);
  Route::post('/collaborator/store', [CollaboratorController::class, 'store']);
  Route::get('/collaborator/show/{id}', [CollaboratorController::class, 'show']);
  Route::put('/collaborator/update/{id}', [CollaboratorController::class, 'update']);
  Route::delete('/collaborator/destroy/{id}', [CollaboratorController::class, 'destroy']);
});
