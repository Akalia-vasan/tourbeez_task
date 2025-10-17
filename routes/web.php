<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/events', [EventController::class, 'index'])->name('event.index');
Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
Route::post('/events/create', [EventController::class, 'store'])->name('event.store');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/events/edit/{id}', [EventController::class, 'update'])->name('event.update');

Route::delete('/events/{id}', [EventController::class, 'delete'])->name('event.delete');

