<?php

namespace App\Http\Classes\LogicalModels\UserInfo;

use App\Models\MySql\ToolzaTranzactionApi\Users;

class UserInfoModel
{
    public function __construct(
        private Users $users,
    ) {

    }

    public function getUserInfoById(int $id): ?array
    {
        return $this->users
            ->where('id', $id)
            ->first()
            ?->toArray();
    }
}
