<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingDisplayController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/booking-screen', [BookingDisplayController::class, 'index']);
//subscribe-to-newsletters
Route::post('/subscribe-to-newsletters', [HomeController::class, 'subscribe'])->name('subscribe');
// about-us 
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
// services
Route::get('/services', [HomeController::class, 'services'])->name('services');
// contact-us
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

// book-service
Route::post('/book-service', [AppController::class, 'bookService'])->name('book-service');
// send-message
Route::post('/send-message', [AppController::class, 'submitContact'])->name('send-message');

// blog
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
// blog-post
Route::get('/blog/{slug}', [HomeController::class, 'blogPost'])->name('blog.post');
//saveBlogComment
Route::post('/blog/comment', [AppController::class, 'saveBlogComment'])->name('blog.comment.save');

//likeBlogPost
Route::post('/blog/like', [AppController::class, 'likeBlogPost'])->name('blog.like');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
