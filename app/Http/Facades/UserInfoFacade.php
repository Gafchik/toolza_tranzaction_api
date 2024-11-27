<?php

namespace App\Http\Facades;

use App\Http\Classes\LogicalModels\UserInfo\UserInfoInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getUserInfoById(int $id);
 * @see UserInfoInterface
 */
class UserInfoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user_info_facade';
    }
}
