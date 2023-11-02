<?php

use Illuminate\Support\Facades\Route;
use Src\BusinessTrip\User\Presentation\API\UserController;

Route::group([
    'prefix' => 'user'
], function () {
    Route::post('', [UserController::class, 'store']);
});
