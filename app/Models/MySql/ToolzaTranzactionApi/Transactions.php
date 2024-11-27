<?php

namespace App\Models\MySql\ToolzaTranzactionApi;

use App\Models\BaseModel;

class Transactions extends BaseModel
{
    protected $connection = 'mysql';
    protected $table = 'transactions';
}
