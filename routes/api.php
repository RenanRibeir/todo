<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoListController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);

//TODO: fix auth
// Route::middleware(['auth'])->group(function () {
Route::get('/todo-list/index', [TodoListController::class, 'index']);
Route::get('/todo-list/store', [TodoListController::class, 'store']);
Route::get('/todo-list/show/{id}', [TodoListController::class, 'show']);
Route::get('/todo-list/update/{id}', [TodoListController::class, 'update']);
Route::get('/todo-list/destroy/{id}', [TodoListController::class, 'destroy']);
// });