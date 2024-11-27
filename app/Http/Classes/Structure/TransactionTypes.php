<?php

namespace App\Http\Classes\Structure;

enum TransactionTypes: int
{
    case DEPOSIT = 1;
    case WITHDRAWAL = 2;
}
