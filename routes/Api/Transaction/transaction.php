<?php


use App\Http\Controllers\Transaction\TransactionController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'transactions',
    ],
    function () {
        Route::get('/', [TransactionController::class, 'getAllTransaction'])
            ->name('api.transactions.get_all_transaction');
        Route::post('/', [TransactionController::class, 'createNewTransaction'])
            ->name('api.transactions.create_new_transaction');
    }
);
