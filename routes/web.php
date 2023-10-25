<?php

use App\Http\Controllers\StudentControler;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|s
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentControler::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentControler::class, 'create'])->name('student.create');
Route::post('/student', [StudentControler::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentControler::class,'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentControler::class,'update'])->name('student.update');
Route::delete('/student/{id}', [StudentControler::class,'destroy'])->name('student.destroy');

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
