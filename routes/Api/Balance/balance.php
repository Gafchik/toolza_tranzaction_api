<?php


use App\Http\Controllers\Balance\BalanceController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'balance',
    ],
    function () {
        Route::get('/{user_id}', [BalanceController::class, 'getUserBalance'])
            ->name('api.balance.get_user_balance');
    }
);
