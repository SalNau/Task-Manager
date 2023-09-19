<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
----------------------------------------------------------------------------------------------------
| Modify it to redirect to the "tasks" page, assuming you have a named route for the "tasks" page.
|---------------------------------------------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
    
});

*/

Route::redirect('/', '/tasks');



Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
//Route::post('/tasks', [TaskController::class, 'store']); need to define only once,below it's defined with tasks.store
//Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
