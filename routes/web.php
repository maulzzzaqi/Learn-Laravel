<?php

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

$taskList = [
    'first' => 'Data 1',
    'second' => 'Data 2',
    'third' => 'Data 3'
];

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});

Route::get('/hello', function () {
    // return response() -> json([
    // ]);
    $dataArray = ['message' => "Hi!",
    'message2' => "anjing"
];
    return ddd($dataArray);
});

Route::get('/task', function () use ($taskList) {
    if (request()->search) {
        return $taskList[request()->search];
    } else {
        return $taskList;
    }
});

Route::get('/task/{param}', function ($param) use ($taskList) {
    return $taskList[$param];
});

Route::post('/task/{key}', function ($key) use ($taskList) {
    // return request()->all();
    $taskList[request()->label] = request()->task;
    return $taskList;
});

Route::patch('/task/{key}', function ($key) use ($taskList) {
    $taskList[request()->key] = request()->task;
    return $taskList;
});

Route::delete('/task/{key}', function ($key) use ($taskList) {
    unset($taskList[$key]);
    return $taskList;
});