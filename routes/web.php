<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\assertClassHasStaticAttribute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/tasks', [TaskController::class, 'index']);

// Route::get('/task', function () use ($taskList) {
//     if (request()->search) {
//         return $taskList[request()->search];
//     } else {
//         return $taskList;
//     }
// });

Route::get('/tasks/{id}', [TaskController::class, 'show']); //show

// Route::post('/task/{key}', function ($key) use ($taskList) {
//     // return request()->all();
//     $taskList[request()->label] = request()->task;
//     return $taskList;
// });

Route::post('/tasks', [TaskController::class, 'store']); //store

// Route::patch('/task/{key}', function ($key) use ($taskList) {
//     $taskList[request()->key] = request()->task;
//     return $taskList;
// });

Route::patch('/tasks/{id}', [TaskController::class, 'update']); //update

// Route::delete('/task/{key}', function ($key) use ($taskList) {
//     unset($taskList[$key]);
//     return $taskList;
// });

Route::delete('/tasks/{id}', [TaskController::class, 'delete']); //delete