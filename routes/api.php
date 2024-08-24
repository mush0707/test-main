<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\QueryController as UserQueryController;
use App\Http\Controllers\Api\User\Rewards\CommandController as UserRewardsCommandController;

Route::group([
    'prefix' => 'user',
    'middleware' => 'client'
], function () {
    // queries
    Route::get('/{id}/check', [UserQueryController::class, 'check']);
    // commands
    Route::group([
        'prefix' => 'rewards',
    ], function () {
        // TODO need to create rewards table
        // TODO need to add routes for rewards table (after store,update).

        Route::post('/{user_id}/{reward_id}', [UserRewardsCommandController::class, 'attachReward']);
        Route::delete('/{reward_id}', [UserRewardsCommandController::class, 'detachReward']);
    });

});
