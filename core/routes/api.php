<?php
use Illuminate\Support\Facades\Route;




Route::controller(App\Http\Controllers\User\UserController::class)->group(function () {

    Route::post('response', 'response')->name('response');
    
});