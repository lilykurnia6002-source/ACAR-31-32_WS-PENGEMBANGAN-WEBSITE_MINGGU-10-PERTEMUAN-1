<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::resource('products', ProductController::class);
Route::get('/image-upload', [ImageController::class, 'index'])->name('image.index');
Route::post('/image-upload', [ImageController::class, 'upload'])->name('image.upload');


Route::get('/send-email', function () {
    $user = (object) [
        'name' => 'Budi',
        'email' => 'budi@example.com'
    ];

    Mail::to($user->email)->send(new WelcomeMail($user));

    return "Email berhasil dikirim!";
});