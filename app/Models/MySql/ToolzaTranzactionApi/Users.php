<?php

namespace App\Models\MySql\ToolzaTranzactionApi;

use App\Models\BaseModel;

class Users extends BaseModel
{
    protected $connection = 'mysql';
    protected $table = 'users';
}
