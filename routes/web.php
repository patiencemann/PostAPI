<?php

    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LoginController;
    use Illuminate\Support\Facades\Route;

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

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [HomeController::class, 'login'])->name('login');

    /**
     * --------------------------------------
     * OAuth pages Web route
     * --------------------------------------
     */
    Route::get('/oauth-login', [HomeController::class, 'login'])->name('get.login');
    Route::get('/oauth/{provider}', [LoginController::class, 'redirectToProvider'])->name('init.oauth');

    /**
     * --------------------------------------
     * OAuth Authentication Web route
     * --------------------------------------
     */
    Route::get('/complete/github/oauth', [LoginController::class, 'handleGithubCallback'])->name('complete.github.oauth');
    Route::get('/complete/google/oauth', [LoginController::class, 'handleGoogleCallback'])->name('complete.google.oauth');

    /**
     * --------------------------------------
     * Authenticated user Web route
     * --------------------------------------
     */
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
