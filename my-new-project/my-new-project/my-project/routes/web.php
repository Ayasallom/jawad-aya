<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function ()
{ return ' أهلاً وسهلاً بكم في دورة Laravel!'; });

Route::get('/info', function () { $name = "محمد أحمد "; // ضع اسمك هن ا
$course = "Laravel للمبتدئين "; $date = date('Y-m-d'); $message = "الاسم : " . $name . "<br>"; $message .= "الدورة : " . $course . "<br>"; $message .= "تاريخ اليوم : " . $date; return $message; });

Route::get('/greet/{name}', function ($name)
{ return " مرحباً يا " . $name . "! كيف حالك اليوم؟ "; });

Route::get('/my-page', function ()
{ return view('my-page', ['name' => 'محمد أحمد ']); });

Route::resource('users', UserController::class);

Route::resource('articles', ArticleController::class);

Route::get('/block5/dashboard', [ProductController::class, 'dashboard'])->name('block5.dashboard');

Route::get('/block5/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/block5/products/store', [ProductController::class, 'store'])->name('products.store');