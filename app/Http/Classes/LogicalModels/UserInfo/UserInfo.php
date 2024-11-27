<?php

namespace App\Http\Classes\LogicalModels\UserInfo;

use App\Http\Classes\LogicalModels\UserInfo\Exceptions\UserNotFoundException;

class UserInfo implements UserInfoInterface
{
    public function __construct(
        private UserInfoModel $model,
    ) {

    }
    public function getUserInfoById(int $id): array
    {
        $userInfo = $this->model->getUserInfoById($id);
        if(is_null($userInfo)){
            throw new UserNotFoundException($id);
        }
        return $userInfo;
    }
}
