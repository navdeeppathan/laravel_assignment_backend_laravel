<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProjectController;

Route::apiResource('projects', ProjectController::class);



Route::apiResource('tasks', TaskController::class);

