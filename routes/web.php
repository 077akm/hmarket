<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\ItemderController;
use App\Http\Controllers\Adm\CommentterController;
use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\Adm\OrderController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\ConfigController;

Route::get('/', function (){
    return redirect()->route('documents.index');
});
Route::get('/config', [ConfigController::class, 'index']);

Route::get('/botman', [BotManController::class, 'handle']);
Route::post('/botman', [BotManController::class, 'handle']);

Route::post('/send-message', [ChatController::class, 'sendMessage']);



Route::get('lang/{lang}/', [LangController::class, 'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function (){
    Route::resource('documents', DocumentController::class)->except('index', 'show');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/documents/lang', [LangController::class, 'langbet'])->name('documents.langbet');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:Adminstrator')->group(function (){
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        Route::get('/users/{user}/edrole', [UserController::class, 'edrole'])->name('users.edrole');

        Route::get('/documents', [ItemderController::class, 'showItems'])->name('documents');
        Route::get('/botchat', [ItemderController::class, 'showsob'])->name('botchat');
        Route::delete('/chatdelete/{messageId}',[ItemderController::class, 'chatdelete'])->name('chatdelete');

        Route::post('/chatdelete/multiple', [ItemderController::class, 'chatdeleteMultiple'])->name('chatdelete_multiple');




        Route::get('/cart', [OrderController::class, 'cart'])->name('cart.index');
        Route::put('/cart/{cart}/confirm', [OrderController::class, 'confirm'])->name('cart.confirm');
    });

});

Route::post('/documents/index', [DocumentController::class, 'zaiavka'])->name('documents.zaiavka');
Route::get('/documents/profile', [DocumentController::class, 'profile'])->name('documents.profile');
Route::get('/documents/calc', [DocumentController::class, 'calc'])->name('documents.calc');
Route::get('/documents/search', [DocumentController::class, 'index'])->name('documents.search');
Route::resource('documents', DocumentController::class)->only('index', 'show');

Route::post('/documents/{document}/approve', [DocumentController::class, 'approve'])->name('documents.approve');

Route::get('/documents/category/{category}', [DocumentController::class, 'itemsByCategory'])->name('documents.category')/*->middleware('hasrole:moderator')*/;

//Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

