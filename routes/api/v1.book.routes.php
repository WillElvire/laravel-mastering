<?php
use App\Http\Controllers\Api\BookController;


Route::controller(BookController::class)->name('book.')->group(function () {
    Route::post('', 'store');
    Route::delete('{id}', 'delete');
    Route::put('', 'update');
});
