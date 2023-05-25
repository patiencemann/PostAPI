<?php

    use App\Http\Controllers\PostmanCollectionController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    /**
     * -----------------------------
     * Authenticated user routes
     * ------------------------------
     */
    Route::group(['middleware' => 'auth:api'], function() {
        /**
         * -----------------------------------------------
         * Coolection API routes
         * ------------------------------------------------
         */
        Route::get('/collections', [PostmanCollectionController::class, 'index'])->name('get.collection');
        Route::post('/collections', [PostmanCollectionController::class, 'store'])->name('store.collections');
        Route::post('/repost/collections/{collection}', [PostmanCollectionController::class, 'repost'])->name('repost.collections');
        Route::delete('/collections/{collection}', [PostmanCollectionController::class, 'destroy'])->name('delete.collections');
        Route::post('/update/collections/{collection}', [PostmanCollectionController::class, 'updateCollection'])->name('update.collections');
        Route::post('/publish/collections/{collection}', [PostmanCollectionController::class, 'publish'])->name('publish.collections');
    });
