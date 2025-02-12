<?php 

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', function () {
    return view('landing');
})->name('landing')->middleware('guest');

Route::get('/register', function () {
    return view('user_register');
})->name('register')->middleware('guest');

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/login', function () {
    return view('user_login');
})->name('login')->middleware('guest');

Route::post('/login', [UserController::class, 'login'])->name('user.login');

// authentication
Route::middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update-avatar', [UserController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

    // Recommendations and Achievements
    Route::get('/recommendations', function () {
        return view('recommendations');
    })->name('recommendations');

    Route::get('/achievements', [UserController::class, 'showAchievements'])->name('achievements');

    // Cart routes
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');
    Route::post('/cart/update', [UserController::class, 'updateCart'])->name('cart.update');
});

// Public or general routes
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/thank-you', [UserController::class, 'thankYou'])->name('thank.you');

// Products Page
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update-avatar', [UserController::class, 'updateAvatar'])->name('profile.update-avatar');
});

Route::post('/profile/update-name', 'App\Http\Controllers\ProfileController@updateName')->name('profile.update-name');
Route::delete('/profile/delete-account', 'App\Http\Controllers\ProfileController@deleteAccount')->name('profile.delete-account');
