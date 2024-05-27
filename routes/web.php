<?php

use App\Http\Controllers\KeyboardController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/', function () { return Inertia::render('Account.CreateAccount'); });

Route::get('/', function() {
    return Inertia::render('LandingPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('open');

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/create', [UserController::class, 'store']);

// Route::get('/loginhub', [UserController::class, 'loginhub'])->name('loginhub');
// Route::get('/loginhub', [UserController::class, 'loginhub'])->name('loginhub');
Route::get('/loginhub', function() {
    return Inertia::render('Account/LoginHub', [
        'canLogin' => Route::has('loginhub'),
    ]);
})->name('loginhub');
Route::post('/login', [UserController::class, 'login'])->name('login'); 

Route::get('/home', [KeyboardController::class, 'home'])->name('home');
Route::get('/keyboards', [KeyboardController::class, 'index'])->name('index');
Route::get('/about', function() {
    return Inertia::render('Keyboard/About');
});
// Route::get('/keyboards/{model}', [KeyboardController::class, 'specs'])->name('specs');
// Route::get('/keyboards/{model}/edit', [KeyboardController::class, 'edit'])->name('edit');
// Route::put('/keyboards/{model}', [KeyboardController::class, 'update'])->name('update');

Route::get('/keyboards/{model}', [KeyboardController::class, 'specs'])->name('specs');
Route::get('/keyboards/{model}/edit', [KeyboardController::class, 'edit'])->name('edit');
// Route::put('/keyboards/{model}', [KeyboardController::class, 'update'])->name('update');
Route::put('/keyboards/{model}', [KeyboardController::class, 'update'])->name('update');
Route::delete('/keyboards/{model}', [KeyboardController::class, 'destroy'])->name('destroy');
// Route::delete('/keyboards/{model}', [KeyboardController::class, 'destroy'])->name('destroy');

// Route::get('/keyboards/{model}', [KeyboardController::class, 'detail'])->name('Keyboard.detail');
// Route::get


Route::get('/create-keyboards', [KeyboardController::class, 'createKeyboard'])->name('createKeyboard');
Route::post('/create-keyboards', [KeyboardController::class, 'store']);
// Route::post('/create-keyboards', [KeyboardController::class, 'store']);

require __DIR__.'/auth.php';
