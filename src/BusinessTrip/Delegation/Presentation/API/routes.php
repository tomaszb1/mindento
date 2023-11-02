<?php

use Illuminate\Support\Facades\Route;
use Src\BusinessTrip\Delegation\Presentation\API\DelegationController;

Route::group([
    'prefix' => 'delegation'
], function () {
    Route::post('', [DelegationController::class, 'store']);
    Route::get('index/{user_id}', [DelegationController::class, 'index']);
});
