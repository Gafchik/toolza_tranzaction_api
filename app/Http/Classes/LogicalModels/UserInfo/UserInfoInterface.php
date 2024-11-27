<?php

namespace App\Http\Classes\LogicalModels\UserInfo;

interface UserInfoInterface
{
    public function getUserInfoById(int $id): array;
}
